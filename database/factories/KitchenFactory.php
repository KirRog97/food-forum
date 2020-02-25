<?php

use Faker\Generator as Faker;

$arrayOfKitchens = ['Китайская', 'Мексиканская', 'Грузинская', 'Фрацузская', 'Японская', 'Индийская', 'Русская', 'Среднеземноморкая', 'Армянская', 'Тайская'];

$factory->define(App\Kitchen::class, function (Faker $faker) use ($arrayOfKitchens) {
    return [
        'name' => $faker->unique()->randomElement($arrayOfKitchens),
    ];
});
