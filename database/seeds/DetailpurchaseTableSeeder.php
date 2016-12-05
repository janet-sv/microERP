<?php

use Illuminate\Database\Seeder;

class DetailpurchaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('purchasesinvoicedetail')->insert([
            'invoice_id'          => '1',
            'product_id'          => '1',
            'amount'  => '1',
            'unitprice'          => '50.0',
            'discounts'  => '0',
            'total'          => '50.0',
           
           
        ]);

          DB::table('purchasesinvoicedetail')->insert([
            'invoice_id'          => '1',
            'product_id'          => '2',
            'amount'  => '1',
            'unitprice'          => '50.0',
            'discounts'  => '0',
            'total'          => '50.0',
           
           
        ]);

           DB::table('purchasesinvoicedetail')->insert([
            
            'invoice_id'          => '2',
            'product_id'          => '2',
            'amount'  => '2',
            'unitprice'          => '100',
            'discounts'  => '0.0',
            'total'          => '100',
           
           
        ]);

    }
}
