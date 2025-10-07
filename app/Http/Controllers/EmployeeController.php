<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    // แสดง profile
    public function profile()
    {
        $employee = Auth::user();
        return view('employee.profile', compact('employee'));
    }

    // ฟอร์มแก้ไข profile
    public function edit()
    {
        $employee = Auth::user();
        return view('employee.edit', compact('employee'));
    }

    // อัปเดต profile
    public function update(Request $request)
    {
        $employee = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $employee->id,
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female,other',
            'birthdate' => 'nullable|date',
            'address' => 'nullable|string|max:500',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $employee->update($request->only(
            'name','lastname','email','phone','gender','birthdate','address'
        ));

        // อัปโหลด profile image
        if ($request->hasFile('profile_image')) {
            if ($employee->profile_image && \Storage::disk('public')->exists($employee->profile_image)) {
                \Storage::disk('public')->delete($employee->profile_image);
            }
            $file = $request->file('profile_image')->store('profiles', 'public');
            $employee->profile_image = $file;
            $employee->save();
        }

        return redirect()->route('employee.profile')->with('success', 'Profile updated');
    }
}
