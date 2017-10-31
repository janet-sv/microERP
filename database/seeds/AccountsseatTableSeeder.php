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

        DB::table('accountseatdetail')->insert([

            'accountseat_id' => '1',
            'account_id' => '116',
            'empresa_id' => '2',
            'etiqueta' => '/',
            'debe' => 100,
            'haber' => 0,
        ]);

        DB::table('accountseatdetail')->insert([

            'accountseat_id' => '1',
            'account_id' => '890',
            'empresa_id' => '2',
            'etiqueta' => 'IGV 18% Venta',
            'debe' => 0,
            'haber' => 18,
        ]);
        DB::table('accountseatdetail')->insert([

            'accountseat_id' => '1',
            'account_id' => '1607',
            'empresa_id' => '2',
            'etiqueta' => 'Factura Venta/1',
            'debe' => 0,
            'haber' => 41,
        ]);
        DB::table('accountseatdetail')->insert([

            'accountseat_id' => '1',
            'account_id' => '1607',
            'empresa_id' => '2',
            'etiqueta' => 'Factura Venta/1',
            'debe' => 0,
            'haber' => 41,
        ]);

        DB::table('accountseatdetail')->insert([

            'accountseat_id' => '2',
            'account_id' => '116',
            'empresa_id' => '2',
            'etiqueta' => '/',
            'debe' => 100,
            'haber' => 0,
        ]);

        DB::table('accountseatdetail')->insert([

            'accountseat_id' => '2',
            'account_id' => '890',
            'empresa_id' => '2',
            'etiqueta' => 'IGV 18% Venta',
            'debe' => 0,
            'haber' => 18,
        ]);
        DB::table('accountseatdetail')->insert([

            'accountseat_id' => '2',
            'account_id' => '1607',
            'empresa_id' => '2',
            'etiqueta' => 'Factura Venta/2',
            'debe' => 0,
            'haber' => 82,
        ]);

//**************************************************************************************
DB::table('accountantseat')->insert([
   'date' => '2016-12-06',
   'code' => 'Factura Compra',
   'number' => '1',
   'company' => 'ERICKELME CLOUD SERVICES',
   'diario_id' => '2',
   'amount' => '100.00',
   'state' => 'Publicado',
]);
 DB::table('accountantseat')->insert([
   'date' => '2016-12-06',
   'code' => 'Factura Compra',
   'number' => '2',
   'company' => 'ERICKELME CLOUD SERVICES',
   'diario_id' => '2',
   'amount' => '100.00',
   'state' => 'Publicado',
]);

DB::table('accountseatdetail')->insert([

   'accountseat_id' => '1',
   'account_id' => '965',
   'empresa_id' => '2',
   'etiqueta' => '/',
   'debe' =>  0,
   'haber' => 100,
]);

DB::table('accountseatdetail')->insert([

   'accountseat_id' => '1',
   'account_id' => '890',
   'empresa_id' => '2',
   'etiqueta' => 'IGV 18% Venta',
   'debe' => 18,
   'haber' => 0,
]);
DB::table('accountseatdetail')->insert([

   'accountseat_id' => '1',
   'account_id' => '1223',
   'empresa_id' => '2',
   'etiqueta' => 'Factura Compra/1',
   'debe' => 41,
   'haber' =>  0,
]);
DB::table('accountseatdetail')->insert([

   'accountseat_id' => '1',
   'account_id' => '1223',
   'empresa_id' => '2',
   'etiqueta' => 'Factura Compra/1',
   'debe' => 41,
   'haber' =>  0,
]);

DB::table('accountseatdetail')->insert([

   'accountseat_id' => '2',
   'account_id' => '965',
   'empresa_id' => '2',
   'etiqueta' => '/',
   'debe' => 0,
   'haber' => 100,
]);

DB::table('accountseatdetail')->insert([

   'accountseat_id' => '2',
   'account_id' => '890',
   'empresa_id' => '2',
   'etiqueta' => 'IGV 18% Venta',
   'debe' =>  18,
   'haber' => 0,
]);
DB::table('accountseatdetail')->insert([

   'accountseat_id' => '2',
   'account_id' => '1223',
   'empresa_id' => '2',
   'etiqueta' => 'Factura Compra/2',
   'debe' =>   82,
   'haber' =>  0,
]);




    }
}
