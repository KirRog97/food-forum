<?php

use App\User;
use App\Post;
use App\Picture;
use App\IngredientPost;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    $usersIdArray = User::select('id')->get();

    return [
        'title'         =>   $faker->name,
        'user_id'       =>   $usersIdArray->random(),
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

$factory->afterCreating(Post::class, function ($post, $faker) {
    $numberOfRelatedIngredients = $faker->numberBetween(2, 12);
    $post->ingredients()->attach(
        factory(IngredientPost::class, $numberOfRelatedIngredients)
            ->make([
                'post_id' => $post->id
            ])->toArray()
    );
});
