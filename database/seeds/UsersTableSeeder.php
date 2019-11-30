<?php

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
        App\User::create([
            'name' => 'M.A Lotif',
            'email' => 'lotif1612@gmail.com',
            'password' => \Hash::make('secret12'),
        ]);
    }
}
