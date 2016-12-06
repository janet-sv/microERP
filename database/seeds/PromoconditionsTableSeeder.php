<?php

use Illuminate\Database\Seeder;

class PromoconditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promoconditions')->insert([
			'nombre'               => '3 x 2',
			'descripcion'          => 'Permite condición 3 x 2',            
			'cantidad_requerida'   => 3,            
			'cantidad_descuento'   => 1,            
			'porcentaje_descuento' => 0,            
        ]);

        DB::table('promoconditions')->insert([
			'nombre'               => '10%',
			'descripcion'          => 'Permite descontar 10%',            
			'cantidad_requerida'   => 1,            
			'cantidad_descuento'   => 0,            
			'porcentaje_descuento' => 10,            
        ]);

        DB::table('promoconditions')->insert([
			'nombre'               => '15%',
			'descripcion'          => 'Permite decsontar 15%',            
			'cantidad_requerida'   => 1,            
			'cantidad_descuento'   => 0,            
			'porcentaje_descuento' => 15,            
        ]);

        DB::table('promoconditions')->insert([
			'nombre'               => '20%',
			'descripcion'          => 'Permite descontar 20%',            
			'cantidad_requerida'   => 1,            
			'cantidad_descuento'   => 0,            
			'porcentaje_descuento' => 20,            
        ]);
    }
}
