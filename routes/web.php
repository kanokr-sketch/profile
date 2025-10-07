<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;

Route::get('/', fn() => redirect()->route('login'));

// 🔐 Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 👑 Admin Routes (ต้อง login + role admin)
Route::middleware(['auth', 'admin'])->group(function () {
    // Employee list
    Route::get('/admin_list', [AdminController::class, 'index'])->name('admin.list');
    Route::get('/admin_edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin_update/{id}', [AdminController::class, 'update'])->name('admin.update');

    // Admin Profile
    Route::get('/profile_admin', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/profile_admin/edit', [AdminController::class, 'editProfile'])->name('admin.profile.edit');
    Route::post('/profile_admin/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
});

// 👷 Employee Routes (ต้อง login + role employee)
Route::middleware(['auth', 'employee'])->group(function () {
    Route::get('/employee', [EmployeeController::class, 'profile'])->name('employee.profile');
    Route::get('/employee/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/employee/update', [EmployeeController::class, 'update'])->name('employee.update');
});
