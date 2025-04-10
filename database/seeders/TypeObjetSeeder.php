<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TypeObjetSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('PRAGMA foreign_keys = OFF;');
        DB::table('types_objets')->truncate();

        DB::table('types_objets')->insert([
            ['id' => 1, 'nom' => 'Lampe', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nom' => 'Thermostat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nom' => 'Alarme', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nom' => 'Volets', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'nom' => 'Caméra de surveillance', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'nom' => 'Aspirateur robot', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'nom' => 'Serrure connectée', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'nom' => 'Capteur de qualité de l’air', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'nom' => 'Interphone connecté', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'nom' => 'Portail', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
