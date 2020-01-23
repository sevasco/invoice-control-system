<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\Seller;
use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    $issued_at = $faker->dateTime;
    $expired_at = $faker->dateTimeBetween($issued_at, now());
    return [
        'issued_at' => $issued_at,
        'expired_at' => $expired_at,
        'description' => $faker->text,
        'vat' => $faker->numberBetween(0,100),
        'status_id' => $faker->numberBetween(1,3),
        'customer_id' => factory(Customer::class),
        'seller_id' => factory(Seller::class)
    ];
});
