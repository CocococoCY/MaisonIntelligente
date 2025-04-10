<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'corent1.lebris@gmail.com'],
            [
                'name' => 'Corentin Le Bris',
                'password' => Hash::make('motdepasse'), // change si besoin
                'role' => 'admin',
                'niveau' => 'Expert',
                'points' => 15,
            ]
        );
    }
}
