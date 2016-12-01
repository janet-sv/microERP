<?php

use Illuminate\Database\Seeder;

class PurchasesInvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Models\Account\PurchasesInvoice::class, 5 )->create();
         DB::table('purchasesinvoice')->insert([
            'document_id' => '3',
            'provider_id'  => '1',
            'number'  => '1',
            'date_invoice'  => '2016-12-01',
            'date_due' => '2016-12-01',
            'amount_total_signed'  => '100.00',
            'residual_signed'  => '0.00',
            'state'  => 'Abierto' ,
            
        ]);
         DB::table('purchasesinvoice')->insert([
            'document_id' => '3',
            'provider_id'  => '2',
            'number'  => '2',
            'date_invoice'  => '2016-12-01',
            'date_due' => '2016-12-01',
            'amount_total_signed'  => '200.00',
            'residual_signed'  => '0.00',
            'state'  => 'Abierto' ,
            
        ]);
    	 DB::table('purchasesinvoice')->insert([
            'document_id' => '3',
            'provider_id'  => '1',
            'number'  => '3',
            'date_invoice'  => '2016-12-01',
            'date_due' => '2016-12-01',
            'amount_total_signed'  => '300.00',
            'residual_signed'  => '0.00',
            'state'  => 'Abierto' ,
            
        ]);
    	 DB::table('purchasesinvoice')->insert([
            'document_id' => '3',
            'provider_id'  => '2',
            'number'  => '4',
            'date_invoice'  => '2016-12-01',
            'date_due' => '2016-12-01',
            'amount_total_signed'  => '400.00',
            'residual_signed'  => '0.00',
            'state'  => 'Abierto' ,
            
        ]);
    	 DB::table('purchasesinvoice')->insert([
            'document_id' => '3',
            'provider_id'  => '1',
            'number'  => '5',
            'date_invoice'  => '2016-12-01',
            'date_due' => '2016-12-01',
            'amount_total_signed'  => '500.00',
            'residual_signed'  => '0.00',
            'state'  => 'Abierto' ,
            
        ]);
    	 DB::table('purchasesinvoice')->insert([
            'document_id' => '3',
            'provider_id'  => '2',
            'number'  => '6',
            'date_invoice'  => '2016-12-01',
            'date_due' => '2016-12-01',
            'amount_total_signed'  => '600.00',
            'residual_signed'  => '0.00',
            'state'  => 'Abierto' ,
            
        ]);
    }
}
