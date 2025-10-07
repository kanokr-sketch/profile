<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 🔹 สร้างแอดมินตัวอย่าง
        User::create([
            'name' => 'Admin',
            'lastname' => 'User',
            'email' => 'admin@example.com',
            'phone' => '0123456789',
            'role' => 'admin',
            'password' => Hash::make('password'), // password: password
        ]);

        // 🔹 สร้าง employee แบบระบุเอง
        User::create([
            'name' => 'John',
            'lastname' => 'Doe',
            'email' => 'employee@example.com',
            'phone' => '0987654321',
            'role' => 'employee',
            'password' => Hash::make('password'),
        ]);

        // 🔹 ใช้ Faker สร้าง employee จำลองเพิ่มอีก 10 คน
        \App\Models\User::factory()->count(10)->create([
            'role' => 'employee',
        ]);
    }
}
