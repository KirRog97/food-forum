<?php

use Faker\Generator as Faker;

$factory->define(App\Picture::class, function (Faker $faker) {
    return [
        'path'  =>  '/storage/' . $faker->image(public_path('storage'), 800, 600, 'food', false),
        'mime'  =>  'image/jpg',
        'size'  =>  $faker->randomDigitNotNull
    ];
});

$factory->defineAs(App\Picture::class, 'avatar', function (Faker $faker) {
    return [
        'path'  =>  '/storage/' . $faker->image(public_path('storage'), 200, 200, 'people', false, 'Faker'),
        'mime'  =>  'image/jpg',
        'size'  =>  $faker->randomDigitNotNull
    ];
});
