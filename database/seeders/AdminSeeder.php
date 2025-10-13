<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@handyvibe.com',
            'mobile' => '+1234567890',
            'password' => Hash::make('admin123'),
            'role' => 'super_admin',
            'status' => 1,
        ]);

        Admin::create([
            'name' => 'Admin User',
            'email' => 'user@handyvibe.com',
            'mobile' => '+1234567891',
            'password' => Hash::make('user123'),
            'role' => 'admin',
            'status' => 1,
        ]);
    }
}
