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
        factory(App\Models\Account\PurchasesInvoice::class, 5 )->create();
    }
}
