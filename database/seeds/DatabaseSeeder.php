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

          $this->call(TrademarksTableSeeder::class);
          $this->call(SocietysTableSeeder::class);
          $this->call(UserTableSeeder::class);
          $this->call(PartnerTableSeeder::class);
          $this->call(SalesInvoiceTableSeeder::class);
          $this->call(ProviderTableSeeder::class);
          $this->call(PurchasesInvoiceTableSeeder::class);
          $this->call(Document_typeTableSeeder::class);
          $this->call(JournalsTableSeeder::class);
          
          $this->call(PromoconditionsTableSeeder::class);
          $this->call(CategoryproductsalesTableSeeder::class);
          $this->call(ProductsalesTableSeeder::class);
    }
}
