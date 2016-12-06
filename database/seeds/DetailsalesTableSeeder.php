<?php

use Illuminate\Database\Seeder;

class DetailsalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
           DB::table('salesinvoicedetail')->insert([
            'invoice_id'          => '1',
            'product_id'          => '1',
            'amount'  => '1',
             'code'  => '1607',
            'unitprice'          => '50.0',
            'discounts'  => '0',
            'total'          => '50.0',
           
           
        ]);

          DB::table('salesinvoicedetail')->insert([
            'invoice_id'          => '1',
            'product_id'          => '2',
            'amount'  => '1',
             'code'  => '1607',
            'unitprice'          => '50.0',
            'discounts'  => '0',
            'total'          => '50.0',
           
           
        ]);

           DB::table('salesinvoicedetail')->insert([
            
            'invoice_id'          => '2',
            'product_id'          => '2',
            'amount'  => '2',
             'code'  => '1607',
            'unitprice'          => '100',
            'discounts'  => '0.0',
            'total'          => '100',
           
           
        ]);

      

         
    }
}
