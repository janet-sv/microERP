<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10) ,
    //factory(App\Models\Account\Partner::class, 4 )->create();
    ];
});

$factory->define(App\Models\Account\Partner::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'ruc' => $faker->unique()->regexify('[1-9]{11}'),
        'country' => 'Perú',
        'department' => 'Lima',
        'province' => 'Lima',
        'district' => 'La victoria',
        'address' => $faker->address,
        'website' => $faker->url,
        'phone' =>$faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'fax' => $faker->areaCode,
        'mail' => $faker->safeEmail,
        'dni_contact' => $faker->unique()->regexify('[1-9]{9}'),
        'title_contact' => 'Gerente',
        'contact' => 'Juan Hernandez',
        'job' => $faker->jobTitle,
    ];
});

$factory->define(App\Models\Account\SalesInvoice::class, function (Faker\Generator $faker) {
    return [
        
        'document_id' => $faker->regexify('[1-5]{1}'),
        'partner_id' => $faker->regexify('[1-5]{1}'),
        'date_invoice' => $faker->date($format = 'Y-m-d', $min ='now', $max = 'now'),
        'user_id' => '1',
        'date_due' => $faker->date($format = 'Y-m-d',$min ='now',  $max = 'now'),
        'amount_total_signed' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 2000),
        'residual_signed' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 2000),
        'state' => 'Cerrado',
        
    ];
});


$factory->define(App\Models\Account\Provider::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'ruc' => $faker->unique()->regexify('[1-9]{11}'),
        'country' => 'Perú',
        'department' => 'Lima',
        'province' => 'Lima',
        'district' => 'La victoria',
        'address' => $faker->address,
        'website' => $faker->url,
        'phone' =>$faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'fax' => $faker->areaCode,
        'mail' => $faker->safeEmail,
        'dni_contact' => $faker->unique()->regexify('[0-9]{9}'),
        'title_contact' => 'Gerente',
        'contact' => 'Vicente Garcia',
        'job' => $faker->jobTitle,
    ];
});

$factory->define(App\Models\Account\PurchasesInvoice::class, function (Faker\Generator $faker) {
    return [
        'document_id' => $faker->regexify('[1-5]{1}'),
        'provider_id' => $faker->regexify('[1-5]{1}'),
        'date_invoice' => $faker->date($format = 'Y-m-d', $min ='now', $max = 'now'),
        'date_due' => $faker->date($format = 'Y-m-d',$min ='now',  $max = 'now'),
        'amount_total_signed' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 2000),
        'residual_signed' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 2000),
        'state' => 'Cerrado',
        
    ];
});