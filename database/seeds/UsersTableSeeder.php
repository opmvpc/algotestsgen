<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'opmvpc',
            'github_id' => '14226423',
            'email' => 'thibsix@outlook.be',
            'avatar' => 'https://avatars1.githubusercontent.com/u/14226423?v=4',
            'est_admin' => true,
        ]);
    }
}
