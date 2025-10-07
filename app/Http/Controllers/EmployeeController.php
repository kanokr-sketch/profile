<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    // หน้าแสดง profile
    public function profile()
    {
        $employee = Auth::user();
        return view('employee.profile', compact('employee'));
    }

    // หน้าแก้ไข profile
    public function edit()
    {
        $employee = Auth::user();
        return view('employee.edit', compact('employee'));
    }

    // บันทึกข้อมูล
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // อัปเดตข้อมูล editable
        $user->update($request->only('name', 'lastname', 'email', 'phone'));

        // อัปโหลดรูปโปรไฟล์
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image && \Storage::disk('public')->exists($user->profile_image)) {
                \Storage::disk('public')->delete($user->profile_image);
            }
            $file = $request->file('profile_image')->store('profiles', 'public');
            $user->profile_image = $file;
            $user->save();
        }

        return redirect()->route('employee.profile')->with('success', 'Profile updated');
    }
}
