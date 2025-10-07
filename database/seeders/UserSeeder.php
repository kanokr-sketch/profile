<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // -----------------------
        // Admin ตัวอย่าง
        // -----------------------
        User::create([
            'name' => 'Admin',
            'lastname' => 'User',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'phone' => '0999999999',
            'position' => 'Manager',
            'department' => 'Management',
            'role' => 'admin',
            'gender' => 'male',
            'birthdate' => '1990-01-01',
            'address' => '123 Admin Street',
            'profile_image' => null,
        ]);

        // -----------------------
        // Employee ตัวอย่าง
        // -----------------------
        User::create([
            'name' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'phone' => '0812345678',
            'position' => 'Developer',
            'department' => 'IT',
            'role' => 'employee',
            'gender' => 'male',
            'birthdate' => '1995-05-15',
            'address' => '456 Employee Road',
            'profile_image' => null,
        ]);

        User::create([
            'name' => 'Jane',
            'lastname' => 'Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'phone' => '0898765432',
            'position' => 'Designer',
            'department' => 'Design',
            'role' => 'employee',
            'gender' => 'female',
            'birthdate' => '1992-09-20',
            'address' => '789 Creative Ave',
            'profile_image' => null,
        ]);
    }
}
