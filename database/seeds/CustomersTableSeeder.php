<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
			'tipo_contribuyente'   => 1,
			'nombre'               => 'Juan' ,
			'apellido_paterno'     => 'Perez' ,
			'apellido_materno'     => 'Dias' ,
			'sexo'                 => 1,
			'tipo_documento'       => 1,
			'numero_documento'     => '71844756',
			'porcentaje_descuento' => 10,
			'plazo_credito'        => 15,
			'linea_credito'        => 150,
			'monto_adeudado'       => 0,
			'estado'               => 1,
			'id_sociedad'          => 1,
        ]);

        DB::table('customers')->insert([
			'tipo_contribuyente'   => 2,
			'nombre'               => 'Pablo' ,
			'apellido_paterno'     => 'Escobar' ,
			'apellido_materno'     => 'Vasquez' ,
			'razon_social'         => 'SOTA CLOUD SERVICES',
			'ruc'                  => '10718447565',
			'direccion'            => 'Calle Chinchon 145. San Isidro',		
			'sexo'                 => 1,
			'tipo_documento'       => 1,
			'numero_documento'     => '71844756',
			'porcentaje_descuento' => 15,
			'plazo_credito'        => 20,
			'linea_credito'        => 1000,
			'monto_adeudado'       => 0,
			'estado'               => 1,
			'id_sociedad'          => 1,
        ]);
    }
}
