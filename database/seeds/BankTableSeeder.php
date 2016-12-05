<?php

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('bank')->insert([
            'name_bank'          => 'BANCO CONTINENTAL',
            'number'  => '0011-0132-0200412942',
            'debit'  => 'Manual',
            'payment'  => 'Manual',
        ]);
         DB::table('bank')->insert([
            'name_bank'          => 'BANCO DE CREDITO',
            'number'  => '0011-0132-0200412292',
            'debit'  => 'Manual',
            'payment'  => 'Manual',
        ]);
        
    }
}
