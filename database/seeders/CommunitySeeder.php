<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Community;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $communities = [
            ['name' => 'Alliance des Eglises Evangeliques de Cote d\'Ivoire', 'sigle' => 'A.E.E.C.I'],
            ['name' => 'Association des Eglises Baptistes Evangeliques de Cote d\'Ivoire', 'sigle' => 'A.E.B.E.C.I'],
            ['name' => 'Eglise Evangelique des Assemblées de Dieu de Cote d\'Ivoire', 'sigle' => 'E.E.A.D.C.I'],
            ['name' => 'Eglise Protestante Evangelique C.M.A', 'sigle' => 'C.M.A'],
            ['name' => 'Eglise Biblique de la Vie Profonde', 'sigle' => ''],
            ['name' => 'Union des Eglises Baptistes Missionnaires de Cote d\'Ivoire', 'sigle' => 'U.N.E.B.A.M.C.I'],
            ['name' => 'Eglise Apostolique du Christ', 'sigle' => ''],
            ['name' => 'Union des Eglises Evangeliques Services et Oeuvres de Cote d\'Ivoire', 'sigle' => 'UEESO-CI'],
            ['name' => 'Eglise de Pentecote de Cote d\'Ivoire', 'sigle' => 'E.P.C.I'],
            ['name' => 'Eglise Evangelique du Reveil de Cote d\'Ivoire', 'sigle' => 'E.E.R.C.I'],
            ['name' => 'Fraternité Chretienne Evangelique', 'sigle' => 'F.C.E'],
            ['name' => 'Eglise du NAZAREEN', 'sigle' => ''],
            ['name' => 'Mission Baptiste de la Nouvelle Alliance en Cote d\'Ivoire', 'sigle' => ''],
            ['name' => 'Mission Internationale de Reveil et de Repentance pour l\'Eglise de Jésus-Christ', 'sigle' => 'MIRRE-J-C'],
            ['name' => 'Fondation Evangelique Victoire', 'sigle' => 'F.E.V'],
            ['name' => 'Eglise Baptiste Libre', 'sigle' => ''],
            ['name' => 'Eglise Evangelique Lutherienne', 'sigle' => ''],
            ['name' => 'Mission Internationale pour la Grande Moisson', 'sigle' => ''],
            ['name' => 'Mission de la Voie de l\'Evangile', 'sigle' => ''],
            ['name' => 'Mission Evangelique', 'sigle' => ''],
            ['name' => 'Eglise Evangelique "Buisson Ardent"', 'sigle' => ''],
        ];

        foreach ($communities as $community) {
            Community::create($community);
        }
    }
}
