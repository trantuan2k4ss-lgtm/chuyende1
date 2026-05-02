<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tạo user admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'phone' => '0123456789',
            'address' => 'Admin Address',
            'role' => 'admin',
        ]);

        // Tạo user customer
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('123456'),
            'phone' => '0987654321',
            'address' => 'Test Address',
            'role' => 'customer',
        ]);

        // Tạo thêm 5 user mẫu
        User::factory(5)->create();
    }
}
