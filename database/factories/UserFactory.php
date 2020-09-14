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
    $user->posts()
        ->saveMany(factory(Post::class, $faker->numberBetween(1, 4))
            ->make([
                'user_id'     =>      $user->id,
            ]));
});
