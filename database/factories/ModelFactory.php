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
        'country' => 'Perú',
        'department' => 'Lima',
        'province' => 'Lima',
        'district' => 'La victoria',
        'address' => $faker->address,
        'website' => $faker->url,
        'job' => $faker->jobTitle,
        'phone' =>$faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'fax' => $faker->areaCode,
        'mail' => $faker->safeEmail,
        'title' => 'Gerente',
    ];
});

$factory->define(App\Models\Account\SalesInvoice::class, function (Faker\Generator $faker) {
    return [
        
        'date_invoice' => $faker->dateTimeThisMonth($max = 'now'),
        'user_id' => '1',
        'date_due' => $faker->dateTimeThisMonth($max = 'now'),
        'amount_total_signed' => $faker->randomFloat,
        'residual_signed' => $faker->randomFloat,
        'state' => 'Cerrado',
        
    ];
});