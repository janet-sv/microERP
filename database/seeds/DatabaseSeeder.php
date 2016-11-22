<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $this->call(UserTableSeeder::class);
          $this->call(PartnerTableSeeder::class);
          $this->call(SalesInvoiceTableSeeder::class);
          $this->call(ProviderTableSeeder::class);
          $this->call(PurchasesInvoiceTableSeeder::class);
          $this->call(Document_typeTableSeeder::class);
    }
}
