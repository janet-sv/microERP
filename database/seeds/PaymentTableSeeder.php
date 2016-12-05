<?php

use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('payment')->insert([
            'date'          => '2016-12-01',
             'number'          => '1',
              'method'          => 'Pago de Ventas',
               'type'          => 'Pago de Ventas',
                'client'          => 'Pago de Ventas',
                 'amount'          => 'Pago de Ventas',
                   'reference'          => 'Pago de Ventas',
                    'state'          => 'Pago de Ventas',
        ]);
        
     
    }
}
