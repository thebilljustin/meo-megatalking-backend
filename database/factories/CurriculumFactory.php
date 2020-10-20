<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curric;
use Faker\Generator as Faker;

$factory->define(Curric::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->text
    ];
});
