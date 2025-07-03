<?php
// database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@fishdanautoba.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_verified' => true,
            'phone' => '08123456789',
            'address' => 'Medan, Sumatera Utara'
        ]);

        // Seller/Nelayan
        User::create([
            'name' => 'Bapak Sihombing',
            'email' => 'nelayan1@fishdanautoba.com',
            'password' => Hash::make('password'),
            'role' => 'seller',
            'is_verified' => true,
            'phone' => '08123456790',
            'address' => 'Parapat, Danau Toba'
        ]);

        User::create([
            'name' => 'Bapak Siregar',
            'email' => 'nelayan2@fishdanautoba.com',
            'password' => Hash::make('password'),
            'role' => 'seller',
            'is_verified' => true,
            'phone' => '08123456791',
            'address' => 'Samosir, Danau Toba'
        ]);

        // Buyer
        User::create([
            'name' => 'Ibu Sari',
            'email' => 'buyer1@fishdanautoba.com',
            'password' => Hash::make('password'),
            'role' => 'buyer',
            'is_verified' => true,
            'phone' => '08123456792',
            'address' => 'Medan, Sumatera Utara'
        ]);
    }
}
