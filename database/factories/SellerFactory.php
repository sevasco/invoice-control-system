<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seller;
use Faker\Generator as Faker;

$factory->define(Seller::class, function (Faker $faker) {
    return [
        'document' => $faker->unique()->numberBetween(10000000, 9999999999),
        'document_type_id' => $faker->numberBetween(1,4),
        'name' => $faker->name,
        'phone_number' => $faker->numberBetween(1000000,9999999),
        'cell_phone_number' => $faker->numberBetween(100000000,999999999),
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail
    ];
});
