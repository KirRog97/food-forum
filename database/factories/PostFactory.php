<?php

use App\User;
use App\Post;
use App\Picture;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'title'         =>   $faker->name,
        'user_id'       =>   factory(User::class)->create(),
        'picture_id'    =>   factory(Picture::class)->create(),
        'category_id'   =>   $faker->numberBetween(1, 11),
        'kitchen_id'    =>   $faker->numberBetween(1, 10),
        'dish_id'       =>   $faker->numberBetween(1, 70),
        'menu_id'       =>   $faker->numberBetween(1, 6),
        'description'   =>   $faker->paragraphs($faker->numberBetween(3, 6), true),
        'instruction'   =>   $faker->text($faker->numberBetween(145, 255)),
        'TTC'           =>   $faker->numberBetween(1, 240),
        'COP'           =>   $faker->numberBetween(1, 12),
        'Kcal'          =>   $faker->numberBetween(100, 2500),
        'is_banned'     =>   0,
        'is_muted'      =>   0
    ];
});
