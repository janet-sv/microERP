<?php

use Illuminate\Database\Seeder;

class PaymentmethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paymentmethod')->insert([
            'name'          => 'BANCO (PEN)',
            'numeration'  => 4,
        ]);
        
        DB::table('paymentmethod')->insert([
            'name'          => 'EFECTIVO (PEN)',
            'numeration'  => 4,
        ]);
              
    }
}
