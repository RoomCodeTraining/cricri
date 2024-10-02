<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Abidjan',
            'Bouaké',
            'Yamoussoukro',
            'San Pedro',
            'Daloa',
            'Korhogo',
            'Man',
            'Divo',
            'Gagnoa',
            'Anyama',
            'Soubre',
            'Agboville',
            'Grand-Bassam',
            'Bondoukou',
            'Boundiali',
            'Bingerville',
            'Dabou',
            'Seguela',
            'Oumé',
            'Ferkessédougou',
            'Dimbokro',
            'Bongouanou',
            'Issia',
            'Zuénoula',
            'Abengourou',
            'Guiglo',
            'Danané',
            'Soubré',
            'Toumodi',
        ];

        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}
