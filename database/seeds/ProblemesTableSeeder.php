<?php

use App\Models\Probleme;
use Illuminate\Database\Seeder;

class ProblemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Probleme::create([
            'nom' => 'Problème 1 : Diviser pour régner',
        ]);

        Probleme::create([
            'nom' => 'Problème 2 : Progra dynamique',
        ]);

        Probleme::create([
            'nom' => 'Problème 3: Algo glouton',
        ]);
    }
}
