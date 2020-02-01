<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'document' => $faker->unique()->numberBetween(10000000, 9999999999),
        'document_type_id' => $faker->numberBetween(1,4),
        'phone_number' => $faker->numberBetween(1000000,9999999),
        'cell_phone_number' => "3".$faker->numberBetween(100000000,999999999),
        'city_id' => $faker->numberBetween(1,20),
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail
    ];
});
