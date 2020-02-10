<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\User;
use App\Seller;
use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    $issued_at = $faker->dateTime;
    $expired_at = $faker->dateTimeBetween($issued_at, now());
    $received_at = $faker->dateTimeBetween($issued_at, now());
    return [
        'number' => $faker->numberBetween(0,100),
        'issued_at' => $issued_at,
        'expired_at' => $expired_at,
        'received_at' => $received_at,
        'description' => $faker->text,
        'subtotal' => $faker->numberBetween(0,100),
        'vat' => $faker->numberBetween(0,100),
        'total' => $faker->numberBetween(0,100),
        'status_id' => $faker->numberBetween(1,4),
        'customer_id' => factory(Customer::class),
        'seller_id' => factory(Seller::class),
        'user_id' => factory(User::class)
    ];
});
