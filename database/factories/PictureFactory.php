<?php

use Faker\Generator as Faker;

$factory->define(App\Picture::class, function (Faker $faker) {
    return [
        'path'  =>  $faker->imageUrl(800, 600, 'food'),
        'mime'  =>  'image/jpg',
        'size'  =>  $faker->randomDigitNotNull
    ];
});

$factory->defineAs(App\Picture::class, 'avatar', function (Faker $faker) {
    return [
        'path'  =>  $faker->imageUrl(200, 200, 'people', true, 'Faker'),
        'mime'  =>  'image/jpg',
        'size'  =>  $faker->randomDigitNotNull
    ];
});
