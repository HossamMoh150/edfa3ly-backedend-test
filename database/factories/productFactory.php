<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\product;
use App\Model;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(0,1000000),

    ];
});
