<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuario 1
        User::firstOrCreate(
            ['email' => 'admin@taller.com'],
            [
                'name' => 'Administrador Taller',
                'password' => Hash::make('password123'),
            ]
        );

        // Usuario 2
        User::firstOrCreate(
            ['email' => 'mecanico@taller.com'],
            [
                'name' => 'Mecánico Juan',
                'password' => Hash::make('password123'),
            ]
        );
    }
}
