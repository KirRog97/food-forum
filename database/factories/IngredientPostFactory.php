<?php

use App\IngredientPost;
use Faker\Generator as Faker;

$factory->define(IngredientPost::class, function (Faker $faker) {
    return [
        'post_id'         =>   $faker->numberBetween(1, 50),
        'ingredient_id'   =>   $faker->numberBetween(1, 50),
        'amount'          =>   $faker->randomNumber(3),
    ];
});
