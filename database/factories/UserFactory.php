<?php

use App\User;
use App\Post;
use App\Picture;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'username'            =>      $faker->name,
        'avatar_id'           =>      factory(Picture::class)->states('avatar')->create(),
        'email'               =>      $faker->unique()->safeEmail,
        'password'            =>      bcrypt('secret'),
        'remember_token'      =>      Str::random(10),
        'email_verified_at'   =>      now(),
    ];
});

$factory->afterCreating(User::class, function ($user, $faker) {
    $numberOfPosts = $faker->numberBetween(1, 4);
    $posts = $user->posts()
        ->saveMany(factory(Post::class, $numberOfPosts)
            ->make([
                'user_id' => $user->id,
            ]));

    // For some reasons 'afterCreate' in PostFactory doesn't work if we create User
    // So making same actions in here
    foreach ($posts as $post) {
        // new random number for each $post
        $numberOfIngredients = $faker->numberBetween(2, 12);
        $post->ingredients()->attach(
            factory(App\IngredientPost::class, $numberOfIngredients)
                ->make([
                    'post_id' => $post->id
                ])->toArray()
        );
    }
});
