<?php

use Illuminate\Database\Seeder;

class CategoryproductsalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
			'code' => '0000001',
			'name' => 'Cerveza',            
        ]);
        DB::table('product_categories')->insert([
			'code' => '0000002',
			'name' => 'Galleteria',            
        ]);
        DB::table('product_categories')->insert([
			'code' => '0000003',
			'name' => 'Gaseosa',            
        ]);
        DB::table('product_categories')->insert([
			'code' => '0000004',
			'name' => 'Jabones',            
        ]);
        DB::table('product_categories')->insert([
			'code' => '0000005',
			'name' => 'Detergentes',            
        ]);

    }
}
