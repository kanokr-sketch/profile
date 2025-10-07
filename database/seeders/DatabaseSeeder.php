<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 🔹 แอดมิน 1 คน
        User::create([
            'name' => 'Admin',
            'lastname' => 'User',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'phone' => '0999999999',
            'position' => 'Administrator',
            'department' => 'Management',
            'role' => 'admin',
        ]);

        // 🔹 พนักงานจำลอง 5 คน
        $employees = [
            [
                'name' => 'Somchai',
                'lastname' => 'Sukjai',
                'email' => 'somchai@test.com',
                'phone' => '0812345678',
                'position' => 'Staff',
                'department' => 'IT',
            ],
            [
                'name' => 'Suda',
                'lastname' => 'Raksuk',
                'email' => 'suda@test.com',
                'phone' => '0823456789',
                'position' => 'HR Officer',
                'department' => 'Human Resource',
            ],
            [
                'name' => 'Anan',
                'lastname' => 'Kittipong',
                'email' => 'anan@test.com',
                'phone' => '0834567890',
                'position' => 'Accountant',
                'department' => 'Finance',
            ],
            [
                'name' => 'Chalisa',
                'lastname' => 'Prasert',
                'email' => 'chalisa@test.com',
                'phone' => '0845678901',
                'position' => 'Sales',
                'department' => 'Marketing',
            ],
            [
                'name' => 'Thanakorn',
                'lastname' => 'Meechai',
                'email' => 'thanakorn@test.com',
                'phone' => '0856789012',
                'position' => 'Technician',
                'department' => 'Maintenance',
            ],
        ];

        foreach ($employees as $emp) {
            User::create([
                'name' => $emp['name'],
                'lastname' => $emp['lastname'],
                'email' => $emp['email'],
                'password' => Hash::make('password'),
                'phone' => $emp['phone'],
                'position' => $emp['position'],
                'department' => $emp['department'],
                'role' => 'employee',
            ]);
        }
    }
}
