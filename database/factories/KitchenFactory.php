<?php

use Faker\Generator as Faker;

$factory->define(App\Kitchen::class, function (Faker $faker) {
    return [
        'name' => $faker->title
    ];
});
