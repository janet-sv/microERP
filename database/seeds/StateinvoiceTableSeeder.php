<?php

use Illuminate\Database\Seeder;

class StateinvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('stateinvoice')->insert([

            'name' => 'abierto',

        ]);
         DB::table('stateinvoice')->insert([

            'name' => 'pagado',

        ]);

        DB::table('stateinvoice')->insert([

           'name' => 'cancelado',

       ]);

    }
}
