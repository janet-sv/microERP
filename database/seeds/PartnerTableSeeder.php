<?php

use Illuminate\Database\Seeder;

class PartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Account\Partner::class, 4 )->create();
        //factory(App\Models\Account\Partner::class, 4 )->create();
        //factory(App\Models\Account\Partner::class, 4 )->create();
    }
}
