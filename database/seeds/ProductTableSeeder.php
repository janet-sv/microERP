<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('product')->insert([
            'name'          => 'licores',
            
        ]);
         DB::table('product')->insert([
            'name'          => 'arroz',
            
        ]);
        
    }
}
