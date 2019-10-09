<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'title'             =>          $faker->name,
        'user_id'           =>          factory(\App\User::class)->create(),
        'picture_id'        =>          factory(\App\Picture::class)->create(),
        'category_id'       =>          $faker->numberBetween(1, 20),
        'kitchen_id'        =>          $faker->numberBetween(1, 20),
        'dish_id'           =>          $faker->numberBetween(1, 20),
        'description'       =>          $faker->paragraphs($faker->numberBetween(3, 6), true),
        'instruction'       =>          $faker->text($faker->numberBetween(145, 255)),
        'TTC'               =>          $faker->numberBetween(1, 240),
        'COP'               =>          $faker->numberBetween(1, 12),
        'Kcal'              =>          $faker->numberBetween(100, 2500),
        'is_banned'         =>          0,
        'is_muted'          =>          0
    ];
});
