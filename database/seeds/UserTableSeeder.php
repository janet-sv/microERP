<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'name' => 'Alejandro Rodriguez',
            'email'  => 'alejandro.rodriguez@pucp.pe',
            'password'  => bcrypt('nico'),
            'remember_token'  => str_random(10) ,
        ]);
    }
}
