<?php

use Illuminate\Database\Seeder;

class SalesInvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //factory(App\Models\Account\SalesInvoice::class, 5  )->create();

    	 DB::table('salesinvoice')->insert([
            'document_id' => '1',
            'partner_id'  => '1',
            'number'  => '1',
            'date_invoice'  => '2016-12-01',
            'user_id'  => '1' ,
            'date_due' => '2016-12-01',
            'igv'  => '18' ,
            'subtotal' => '82',
            'amount_total_signed'  => '100.00',
            'residual_signed'  => '100.00',
            'state_id'  => '1',
            
        ]);
    	 DB::table('salesinvoice')->insert([
            'document_id' => '1',
            'partner_id'  => '2',
            'number'  => '2',
            'date_invoice'  => '2016-12-01',
            'user_id'  => '1' ,
            'date_due' => '2016-12-01',
            'igv'  => '18' ,
            'subtotal' => '82',
            'amount_total_signed'  => '100.00',
            'residual_signed'  => '100.00',
            'state_id'  => '1',
            
        ]);
    	/* DB::table('salesinvoice')->insert([
            'document_id' => '1',
            'partner_id'  => '3',
            'number'  => '3',
            'date_invoice'  => '2016-12-01',
            'user_id'  => '1' ,
            'date_due' => '2016-12-01',
            'amount_total_signed'  => '300.00',
            'residual_signed'  => '0.00',
            'state_id'  => '1',
            
        ]);
    	 DB::table('salesinvoice')->insert([
            'document_id' => '1',
            'partner_id'  => '4',
            'number'  => '4',
            'date_invoice'  => '2016-12-01',
            'user_id'  => '1' ,
            'date_due' => '2016-12-01',
            'amount_total_signed'  => '400.00',
            'residual_signed'  => '0.00',
            'state_id'  => '1',
            
        ]);
    	 DB::table('salesinvoice')->insert([
            'document_id' => '1',
            'partner_id'  => '5',
            'number'  => '5',
            'date_invoice'  => '2016-12-01',
            'user_id'  => '1' ,
            'date_due' => '2016-12-01',
            'amount_total_signed'  => '500.00',
            'residual_signed'  => '0.00',
            'state_id'  => '1',
            
        ]);
    	 DB::table('salesinvoice')->insert([
            'document_id' => '1',
            'partner_id'  => '6',
            'number'  => '6',
            'date_invoice'  => '2016-12-01',
            'user_id'  => '1' ,
            'date_due' => '2016-12-01',
            'amount_total_signed'  => '600.00',
            'residual_signed'  => '0.00',
            'state_id'  => '1',
            
        ]);  */

    }
}
