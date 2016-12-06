<?php

use Illuminate\Database\Seeder;

class AccountsseatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('accountantseat')->insert([
            'date' => '2016-12-06',
            'code' => 'Factura Venta',
            'number' => '1',
            'company' => 'ERICKELME CLOUD SERVICES',
            'diario_id' => '1',
            'amount' => '100.00',
            'state' => 'Publicado',
        ]);
          DB::table('accountantseat')->insert([
            'date' => '2016-12-06',
            'code' => 'Factura Venta',
            'number' => '2',
            'company' => 'ERICKELME CLOUD SERVICES',
            'diario_id' => '1',
            'amount' => '100.00',
            'state' => 'Publicado',
        ]);
        
    }
}
