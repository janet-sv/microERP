<?php

use Illuminate\Database\Seeder;

class Document_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('document_type')->insert([
            'name'          => 'Factura Venta',
            'description'  => NULL,
            'numeration'  => 3,
        ]);
        
        DB::table('document_type')->insert([
            'name'          => 'Nota de Credito',
            'description'  => NULL,
            'numeration'  => 1,
        ]);

        DB::table('document_type')->insert([
           'name'          => 'Boleta Venta',
            'description'  => NULL,
            'numeration'  => 1,
        ]);
        
         DB::table('document_type')->insert([
           'name'          => 'Factura Compra',
            'description'  => NULL,
            'numeration'  => 3,
        ]);

        DB::table('document_type')->insert([
           'name'          => 'Nota de debito',
            'description'  => NULL,
            'numeration'  => 1,
        ]);
        
        DB::table('document_type')->insert([
           'name'          => 'Boleta Compra',
            'description'  => NULL,
            'numeration'  => 1,
        ]);
        
    }
}
