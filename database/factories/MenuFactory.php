<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Menu;
use Faker\Generator as Faker;

$arrayOfMenus = ['Вегетарианская еда', 'Веганская еда', 'Детское меню', 'Низкоколорийная еда', 'Постная еда', 'Меню при диабете'];

$factory->define(Menu::class, function (Faker $faker) use ($arrayOfMenus) {
    return [
        'name' => $faker->unique()->randomElement($arrayOfMenus)
    ];
});
