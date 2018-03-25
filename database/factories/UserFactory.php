<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'cnpj' => $faker->numberBetween(11111111111111,99999999999999),
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
    ];
});

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
    ];
});

$factory->define(App\Models\Update::class, function (Faker $faker) {
    return [
        'product_id' => random_int(1,20),
        'path' => 'http://localhost/'.str_random(4),
        'news' => $faker->text
    ];
});

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
       // 'customer_id' => random_int(1,40),
        'product_id'  => random_int(1,20),
        'observation' => $faker->text,
        'blocked'     => random_int(0,1),
    ];
});

$factory->define(App\Models\Phone::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone'  => $faker->phoneNumber,
        'observation' => $faker->text,
    ];
});