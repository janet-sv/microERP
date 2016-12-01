<?php

use Illuminate\Database\Seeder;

class TaxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('journal')->insert([
            'name' => 'IGV(Ventas)',
            'scope_tax'  => 'Ventas',
            'tax_calculation' => 'Porcentaje',
            'amount'  => '0.18',
            
        ]);
         DB::table('journal')->insert([
            'name' => 'IGV(Compras)',
            'scope_tax'  => 'Compras',
            'tax_calculation' => 'Porcentaje',
            'amount'  => '0.18',
            
        ]);
    }
}
