<?php

use Faker\Generator as Faker;

$factory->define(App\Picture::class, function (Faker $faker) {
    $imgPath =  '/images/recipes/default_post_img.svg';
    return [
        'path'  =>   $imgPath,
        'mime'  =>  'image/jpg',
        'size'  =>  $faker->randomDigitNotNull
    ];
});

$factory->defineAs(App\Picture::class, 'avatar', function (Faker $faker) {
    $imgPath =  '/images/icons/user_avacado.svg';
    return [
        'path'  =>  $imgPath,
        'mime'  =>  'image/jpg',
        'size'  =>  $faker->randomDigitNotNull
    ];
});
