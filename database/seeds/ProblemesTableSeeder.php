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
            'nom' => 'Diviser pour régner',
        ]);

        Probleme::create([
            'nom' => 'Progra dynamique',
        ]);

        Probleme::create([
            'nom' => 'Algo glouton',
        ]);
    }
}
