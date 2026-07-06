<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@iep.com',
            'ic_number' => '000000-00-0000',
            'phone' => '012-0000000',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'status' => 'active',
        ]);
    }
}