<?php

use Faker\Generator as Faker;

$arrayOfCategories = ['Заготовки', 'Выпечка и десерты', 'Основные блюда', 'Завтраки', 'Салаты', 'Супы', 'Паста и пицца', 'Закуски', 'Сэндвичи',  'Напитки', 'Бульоны'];

$factory->define(App\Category::class, function (Faker $faker) use ($arrayOfCategories) {
    return [
        'name' => $faker->unique()->randomElement($arrayOfCategories)
    ];
});
