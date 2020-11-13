<?php

use App\Ingredient;
use App\IngredientPost;
use Faker\Generator as Faker;

$factory->define(IngredientPost::class, function (Faker $faker) {
    $ingredientsIdArray = Ingredient::select('id')->get();

    return [
        'post_id'        =>  $faker->numberBetween(1, 5),
        'ingredient_id'  =>  $ingredientsIdArray->random()->id,
        'amount'         =>  $faker->randomNumber(3)
    ];
});
