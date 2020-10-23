<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\product;
use App\Models\offer;
use App\Model;
use Faker\Generator as Faker;

$factory->define(offer::class, function (Faker $faker) {
    return [
        'percent_off' => $faker->numberBetween(0,100)

    ];
});
