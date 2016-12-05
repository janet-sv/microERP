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
        //factory(App\Models\Account\Partner::class, 4 )->create();

        DB::table('partner')->insert([
            'name' => 'Comercializadora Sally',
            'ruc'  => '12345678912',
            'country'  => 'Perú',
            'department'  => 'Lima' ,
            'province' => 'Lima',
            'district'  => 'Los olivos',
            'address'  => 'Av. Universitaria 1901',
            'website'  => 'www.comercialsally.com' ,
            'phone' => '015311384',
            'mobile'  => '98412012',
            'fax'  => '0121',
            'mail'  => 'comercialsally@hotmail.com' ,
            'dni_contact' => '46474598',
            'title_contact'  => 'Sr.',
            'contact'  => 'Ludovico BuenDia',
            'job'  => 'Gerente' ,
        ]);
        DB::table('partner')->insert([
            'name' => 'Comercializadora Willy',
            'ruc'  => '13345678914',
            'country'  => 'Perú',
            'department'  => 'Lima' ,
            'province' => 'Lima',
            'district'  => 'Los olivos',
            'address'  => 'Av. generales',
            'website'  => 'www.comercialwilly.com' ,
            'phone' => '015311381',
            'mobile'  => '98422013',
            'fax'  => '0121',
            'mail'  => 'comercialwilly@hotmail.com' ,
            'dni_contact' => '46474511',
            'title_contact'  => 'Sr.',
            'contact'  => 'Gerundio Flores',
            'job'  => 'Gerente' ,
        ]);
        DB::table('partner')->insert([
            'name' => 'Comercializadora Santiago',
            'ruc'  => '12345678931',
            'country'  => 'Perú',
            'department'  => 'Lima' ,
            'province' => 'Lima',
            'district'  => 'Los olivos',
            'address'  => 'Av. tulipanes',
            'website'  => 'www.comercialsantiago.com' ,
            'phone' => '012541384',
            'mobile'  => '98412013',
            'fax'  => '0121',
            'mail'  => 'comercialsantiago@hotmail.com' ,
            'dni_contact' => '12374598',
            'title_contact'  => 'Sr.',
            'contact'  => 'Felipe Guzman',
            'job'  => 'Gerente' ,
        ]);
        DB::table('partner')->insert([
            'name' => 'Comercializadora LuzdeOriente',
            'ruc'  => '12345743912',
            'country'  => 'Perú',
            'department'  => 'Lima' ,
            'province' => 'Lima',
            'district'  => 'Los olivos',
            'address'  => 'Av. Universitaria 1764',
            'website'  => 'www.comercialluzdeOriente.com' ,
            'phone' => '015311482',
            'mobile'  => '91412012',
            'fax'  => '0121',
            'mail'  => 'comercialluzdeoriente@hotmail.com' ,
            'dni_contact' => '46574598',
            'title_contact'  => 'Sr.',
            'contact'  => 'Juan Alfonso',
            'job'  => 'Gerente' ,
        ]);
        DB::table('partner')->insert([
            'name' => 'Comercializadora BuenDia',
            'ruc'  => '13345678912',
            'country'  => 'Perú',
            'department'  => 'Lima' ,
            'province' => 'Lima',
            'district'  => 'Los olivos',
            'address'  => 'Av. pelicanos',
            'website'  => 'www.comercialbuendia.com' ,
            'phone' => '015311484',
            'mobile'  => '98413012',
            'fax'  => '0121',
            'mail'  => 'comercialbuendia@hotmail.com' ,
            'dni_contact' => '46412598',
            'title_contact'  => 'Sr.',
            'contact'  => 'Mariano Flores',
            'job'  => 'Gerente' ,
        ]);
        
        
      
    }
}
