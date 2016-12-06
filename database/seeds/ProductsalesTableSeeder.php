<?php

use Illuminate\Database\Seeder;

class ProductsalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
			'code'         => '0000001',
			'name'         => 'Pilsen lata',            
			'status'       => 1,
			'id_category'  => 1,
			'id_trademark' => 1,
        ]);
        DB::table('products')->insert([
			'code' => '0000002',
			'name' => 'Oreo 50gr',            
			'status'       => 1,
			'id_category'  => 2,
			'id_trademark' => 2,
        ]);
        DB::table('products')->insert([
			'code' => '0000003',
			'name' => 'Guarana 500ml',            
			'status'       => 1,
			'id_category'  => 3,
			'id_trademark' => 3,
        ]);
        DB::table('products')->insert([
			'code' => '0000004',
			'name' => 'Nivea',  
			'status'       => 1,
			'id_category'  => 4,
			'id_trademark' => 4,          
        ]);
        DB::table('products')->insert([
			'code' => '0000005',
			'name' => 'Magia blanca 100gr',            
			'status'       => 1,
			'id_category'  => 5,
			'id_trademark' => 5,
        ]);
    }
}
