<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipalitys = [
            ['name' => 'Commune d\'Abobo','city_id' => 1],
            ['name' => 'Commune d\'Adjamé','city_id' => 1],
            ['name' => 'Commune de Yopougon','city_id' => 1],
            ['name' => 'Commune d\'Attecoube','city_id' => 1],
            ['name' => 'Commune de Marcory','city_id' => 1],
            ['name' => 'Commune de Cocody','city_id' => 1],
            ['name' => 'Commune de Treichville','city_id' => 1],
            ['name' => 'Commune de Koumassi','city_id' => 1],
            ['name' => 'Commune de Port-Bouët','city_id' => 1],
            ['name' => 'Commune d\'Anyama','city_id' => 1],
            ['name' => 'Commune d\'Bingerville','city_id' => 1],
            ['name' => 'Commune de Bouaké', 'city_id' => 2],
            ['name' => 'Commune de Yamoussoukro', 'city_id' => 3],
            ['name' => 'Commune de San Pedro', 'city_id' => 4],
            ['name' => 'Commune de Daloa', 'city_id' => 5],
            ['name' => 'Commune de Korhogo', 'city_id' => 6],
            ['name' => 'Commune de Man', 'city_id' => 7],
            ['name' => 'Commune de Divo', 'city_id' => 8],
            ['name' => 'Commune de Gagnoa', 'city_id' => 9],
            ['name' => 'Commune d\'Anyama', 'city_id' => 10],
            ['name' => 'Commune de Soubre', 'city_id' => 11],
            ['name' => 'Commune d\'Agboville', 'city_id' => 12],
            ['name' => 'Commune de Grand-Bassam', 'city_id' => 13],
            ['name' => 'Commune de Bondoukou', 'city_id' => 14],
            ['name' => 'Commune de Boundiali', 'city_id' => 15],
            ['name' => 'Commune de Bingerville', 'city_id' => 16],
            ['name' => 'Commune de Dabou', 'city_id' => 17],
            ['name' => 'Commune de Seguela', 'city_id' => 18],
            ['name' => 'Commune d\'Oumé', 'city_id' => 19],
            ['name' => 'Commune de Ferkessédougou', 'city_id' => 20],
            ['name' => 'Commune de Dimbokro', 'city_id' => 21],
            ['name' => 'Commune de Bongouanou', 'city_id' => 22],
            ['name' => 'Commune d\'Issia', 'city_id' => 23],
            ['name' => 'Commune de Zuénoula', 'city_id' => 24],
            ['name' => 'Commune d\'Abengourou', 'city_id' => 25],
            ['name' => 'Commune de Guiglo', 'city_id' => 26],
            ['name' => 'Commune de Danané', 'city_id' => 27],
            ['name' => 'Commune de Soubré', 'city_id' => 28],
            ['name' => 'Commune de Toumodi', 'city_id' => 29],
        ];
        foreach ($municipalitys as $municipality) {
            DB::table('municipalities')->insert([
                'name' => $municipality['name'],
                'city_id' => $municipality['city_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
