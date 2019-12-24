<?php

use Faker\Generator as Faker;

$factory->define(\App\PostIngredient::class, function (Faker $faker) {
    return [
        'post_id'   =>   $faker->numberBetween(1, 20),
        'user_id'   =>   $faker->numberBetween(1, 20),
        'amount'    =>   $faker->randomNumber(3),
    ];
});
