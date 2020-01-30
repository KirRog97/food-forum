<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'username'            =>      $faker->name,
        'avatar_id'           =>      factory(App\Picture::class, 'avatar')->create(),
        'email'               =>      $faker->unique()->safeEmail,
        'password'            =>      bcrypt('secret'),
        'remember_token'      =>      $faker->md5(),
        'email_verified_at'   =>      now(),
    ];
});
