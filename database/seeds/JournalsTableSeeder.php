<?php

use Illuminate\Database\Seeder;

class JournalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('journal')->insert([
            'name'          => 'Ventas',
            'description'  => 'Diario de Ventas',
            
        ]);
        
        DB::table('journal')->insert([
            'name'          => 'Compras',
            'description'  => 'Diario de Compras',
            
        ]);
        
         DB::table('journal')->insert([
           'name'          => 'Efectivo',
            'description'  => 'Diario de efectivo',
            
        ]);

        DB::table('journal')->insert([
           'name'          => 'Banco',
            'description'  => 'Diario de banco',
            
        ]);
    }
}
