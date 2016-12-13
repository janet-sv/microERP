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
            'name'          => 'EFECTIVO',
            'numeration'  => 1,
             
        ]);
        DB::table('paymentmethod')->insert([
            'name'          => 'BANCO',
            'numeration'  => 1,
           
        ]);
        
        

      
              
    }
}
