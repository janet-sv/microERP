<?php

use Illuminate\Database\Seeder;

class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //factory(App\Models\Account\Provider::class, 5 )->create();

    	 DB::table('provider')->insert([
            'name' => 'Distribuidora Internacional',
            'ruc'  => '19115678912',
            'country'  => 'Perú',
            'department'  => 'Lima' ,
            'province' => 'Lima',
            'district'  => 'Los olivos',
            'address'  => 'Av. Universitaria',
            'website'  => 'www.comercialinternacional.com' ,
            'phone' => '017311384',
            'mobile'  => '98112012',
            'fax'  => '0121',
            'mail'  => 'comercialinternacional@hotmail.com' ,
            'dni_contact' => '46474428',
            'title_contact'  => 'Sr.',
            'contact'  => 'Vicente Alegria',
            'job'  => 'Gerente' ,


        ]);
    	 DB::table('partner')->insert([
            'name' => 'Distribuidora Milenio',
            'ruc'  => '13345318914',
            'country'  => 'Perú',
            'department'  => 'Lima' ,
            'province' => 'Lima',
            'district'  => 'Los olivos',
            'address'  => 'Av. Flores',
            'website'  => 'www.comercialmilenio.com' ,
            'phone' => '015311111',
            'mobile'  => '98422082',
            'fax'  => '0121',
            'mail'  => 'comercialmilenio@hotmail.com' ,
            'dni_contact' => '48274511',
            'title_contact'  => 'Sr.',
            'contact'  => 'Micaela Sifuentes',
            'job'  => 'Gerente' ,
        ]);
    }
}
