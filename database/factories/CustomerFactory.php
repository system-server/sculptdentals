<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {

    $name           = $faker->name;
    $lastname_one   = $faker->lastname;
    $lastname_two   = $faker->lastname;
    $full_name      = $lastname_one . ' ' . $lastname_two . ' ' . $name;

    return [
        'name'          => $name,
        'last_name_one' => $lastname_one,
        'last_name_two' => $lastname_two,
        'full_name'     => $full_name,
        'address'       => $faker->streetAddress,
        'references'    => $faker->address,
        'age'           => rand(1,99),
        'cell_phone'    => $faker->tollFreePhoneNumber,
        'home_phone'    => $faker->tollFreePhoneNumber,
        'sex'           => $faker->randomElement(['MASCULINO','FEMENINO']),
        'civil_state'   => $faker->randomElement(['SOLTERO','CASADO','VIUDO']),
        'img_name'      => $faker->imageUrl($width = 400, $height=400),
        'status'        => $faker->randomElement(['ACTIVO','INACTIVO']),    
        'occupation_id' => rand(1,3),
    ];

});