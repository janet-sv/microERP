<?php

use Illuminate\Database\Seeder;

class SocietysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('societys')->insert([
			'id'           => 1,
			'direccion'    => 'Jr Verona 438. Urb. Fiori',
			'descripcion'  => 'Microempresa de venta de abarrotes',
			'razon_social' => "BODEGA LUCY",
			'ruc'          => '10101432985',	        
        ]);
    }
}
