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
        
        DB::table('users')->insert([
            'name' => 'Erick Gonzales',
            'email'  => 'gonzales.erick@pucp.edu.pe',
            'password'  => bcrypt('erickelme'),
            'remember_token'  => str_random(10) ,
        ]);
    }
}
