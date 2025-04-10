<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZoneSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('zones')->insert([
            ['id' => 1, 'nom' => 'Salon', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nom' => 'Salle de bain', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nom' => 'Cuisine', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nom' => 'Chambre 1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'nom' => 'Chambre 2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'nom' => 'Salle à manger', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'nom' => 'Extérieur', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'nom' => 'Entrée', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
