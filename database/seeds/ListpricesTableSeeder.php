<?php

use Illuminate\Database\Seeder;

class ListpricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('listprices')->insert([
			'precio'     => 2.8,
			'id_producto' => 1,            
			'estado'     => 1,            
        ]);
        DB::table('listprices')->insert([
			'precio'     => 0.6,
			'id_producto' => 2,            
			'estado'     => 1,            
        ]);
        DB::table('listprices')->insert([
			'precio'     => 1.5,
			'id_producto' => 3,            
			'estado'     => 1,            
        ]);
        DB::table('listprices')->insert([
			'precio'     => 2,
			'id_producto' => 4,            
			'estado'     => 1,            
        ]);
    }
}
