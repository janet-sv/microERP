<?php

use Illuminate\Database\Seeder;

class PaymenttypeTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paymenttype')->insert([
            'name'          => 'Pago de Ventas',
        ]);
        
        DB::table('paymenttype')->insert([
            'name'          => 'Pago de Compras',
        ]);
    }
}
