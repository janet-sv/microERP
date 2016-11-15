<?php

use Illuminate\Database\Seeder;

class TrademarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('trademarks')->insert([
            'name'          => 'Gloria',
            'description'  => null,
        ]);
        
        DB::table('trademarks')->insert([
            'name'          => 'Frugos',
            'description'  => null,
        ]);
        
        DB::table('trademarks')->insert([
            'name'          => 'Cielo',
            'description'  => null,
        ]);
        
        DB::table('trademarks')->insert([
            'name'          => 'Bimbo',
            'description'  => null,
        ]);
        
        DB::table('trademarks')->insert([
            'name'          => 'Coca Cola',
            'description'  => null,
        ]);
        
        DB::table('trademarks')->insert([
            'name'          => 'Fanny',
            'description'  => null,
        ]);
        
        DB::table('trademarks')->insert([
            'name'          => 'Costeño',
            'description'  => null,
        ]);
        
        DB::table('trademarks')->insert([
            'name'          => 'Florida',
            'description'  => null,
        ]);
        
        DB::table('trademarks')->insert([
            'name'          => 'Molitalia',
            'description'  => null,
        ]);
        
        DB::table('trademarks')->insert([
            'name'          => 'Laive',
            'description'  => null,
        ]);
        
        DB::table('trademarks')->insert([
            'name'          => 'Field',
            'description'  => null,
        ]);
        
        DB::table('trademarks')->insert([
            'name'          => 'San Fernando',
            'description'  => null,
        ]);
    
    }
}
