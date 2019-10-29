<?php

use App\Models\Test;
use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Test::create([
            'nom' => 'DiviserPourRegner_2.2',
            'body' => '42',
            'resultat' => 'null',
            'est_approuve' => false,
            'user_id' => 1,
            'probleme_id' => 1,
        ]);



        Test::create([
            'nom' => 'DiviserPourRegner_1.1',
            'body' => '4
5 2
-3 8 2 1 -6
12 1
1 3 3 7 1 3 3 7 1 3 3 7
5 10
-1 -2 -3 -4 -5
5 1
10 -5 10 -4 1',
            'resultat' => '{"22", "42", "0", "15"}',
            'est_approuve' => false,
            'user_id' => 1,
            'probleme_id' => 1,
        ]);



        Test::create([
            'nom' => 'DiviserPourRegner_1.2',
            'body' => '4
5 2
-3 8 2 1 -6
12 1
1 3 3 7 1 3 3 7 1 3 3 7
5 10
-1 -2 -3 -4 -5
5 1
10 -5 10 -4 1',
            'resultat' => '{"22", "42", "0", "15"}',
            'est_approuve' => false,
            'user_id' => 1,
            'probleme_id' => 3,
        ]);



        Test::create([
            'nom' => 'DiviserPourRegner_1.3',
            'body' => '4
5 2
-3 8 2 1 -6
12 1
1 3 3 7 1 3 3 7 1 3 3 7
5 10
-1 -2 -3 -4 -5
5 1
10 -5 10 -4 1',
            'resultat' => '{"22", "42", "0", "15"}',
            'est_approuve' => true,
            'user_id' => 1,
            'probleme_id' => 2,
        ]);



        Test::create([
            'nom' => 'DiviserPourRegner_2.1',
            'body' => '4
5 2
-3 8 2 1 -6
12 1
1 3 3 7 1 3 3 7 1 3 3 7
5 10
-1 -2 -3 -4 -5
5 1
10 -5 10 -4 1',
            'resultat' => '{"22", "42", "0", "15"}',
            'est_approuve' => false,
            'user_id' => 1,
            'probleme_id' => 2,
        ]);
    }
}
