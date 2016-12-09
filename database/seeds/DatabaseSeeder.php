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
          $this->call(CustomersTableSeeder::class);
          $this->call(Document_typeTableSeeder::class);
          $this->call(StateinvoiceTableSeeder::class);
          $this->call(PartnerTableSeeder::class);
          $this->call(SalesInvoiceTableSeeder::class);
          $this->call(ProviderTableSeeder::class);
          $this->call(PurchasesInvoiceTableSeeder::class);
          $this->call(JournalsTableSeeder::class); 
          $this->call(AccountsseatTableSeeder::class);
          $this->call(PaymentmethodTableSeeder::class);
          $this->call(PaymenttypeTableSeede::class);
          $this->call(BankTableSeeder::class);
          $this->call(TaxesTableSeeder::class);
          $this->call(AccountsplanTableSeeder::class);


          $this->call(DetailpurchaseTableSeeder::class);
          $this->call(DetailsalesTableSeeder::class);




          //Modulo ventas          
         
          $this->call(PromoconditionsTableSeeder::class);
          $this->call(CategoryproductsalesTableSeeder::class);
          $this->call(ProductsalesTableSeeder::class);
          $this->call(ListpricesTableSeeder::class);          

    }
}
