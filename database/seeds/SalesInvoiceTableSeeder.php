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
         factory(App\Models\Account\SalesInvoiceTableSeeder::class, 5  )->create();

         //factory(App\Models\Account\Partner::class, 4 )->create();
         //factory(App\Models\Account\Partner::class, 4 )->create();
    }
}
