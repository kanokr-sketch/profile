<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // -----------------------------
    // Employee List & Edit
    // -----------------------------
    
    public function index()
    {
        $employees = User::where('role', 'employee')->get();
        return view('admin.employee_list', compact('employees'));
    }

    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('admin.admin_edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $employee->id,
            'phone' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $employee->update($request->only('name', 'lastname', 'email', 'phone', 'position', 'department'));

        // อัปโหลดรูป profile
        if ($request->hasFile('profile_image')) {
            if ($employee->profile_image && \Storage::disk('public')->exists($employee->profile_image)) {
                \Storage::disk('public')->delete($employee->profile_image);
            }
            $file = $request->file('profile_image')->store('profiles', 'public');
            $employee->profile_image = $file;
            $employee->save();
        }

        return redirect()->route('admin.list')->with('success', 'Updated successfully');
    }

    // -----------------------------
    // Admin Profile
    // -----------------------------

    public function profile()
    {
        $admin = auth()->user();
        return view('admin.profile', compact('admin'));
    }

    public function editProfile()
    {
        $admin = auth()->user();
        return view('admin.edit_profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'phone' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $admin->update($request->only('name', 'lastname', 'email', 'phone', 'position', 'department'));
        
        if ($request->hasFile('profile_image')) {
            if ($admin->profile_image && \Storage::disk('public')->exists($admin->profile_image)) {
                \Storage::disk('public')->delete($admin->profile_image);
            }
            $file = $request->file('profile_image')->store('profiles', 'public');
            $admin->profile_image = $file;
            $admin->save();
        }

        return redirect()->route('admin.profile')->with('success', 'Profile updated');
    }
}
