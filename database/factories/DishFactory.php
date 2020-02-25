<?php

use Faker\Generator as Faker;

$arrayOfPreparedStuff = ['Варенье', 'Салаты на зиму', 'Соленья и консервация'];
$arrayOfPastriesAndDesserts = ['Анма', 'Беляши', 'Бисквит', 'Бискотти', 'Блины', 'Брауни', 'Бублик', 'Булочки', 'Ватрушки', 'Вафли', 'Галетты', 'Кексы', 'Мусс', 'Слойки'];
$arrayOfMainDishes = ['Бешбармак', 'Биточки', 'Бифштекс', 'Буженина', 'Гуляш', 'Кебаб', 'Пельмени', 'Роллы'];
$arrayOfBreakfasts = ['Драники', 'Каши', 'Мюсли', 'Омлет', 'Сырники', 'Яичница'];
$arrayOfSalads = ['Винегреты', 'Греческий салат', 'Мясные салаты', 'Овощные салаты', 'Оливье', 'Салат Цезарь', 'Фруктовые салаты'];
$arrayOfSoups = ['Борщ', 'Гаспачо', 'Гороховый суп', 'Грибной суп', 'Мисо', 'Окрошка', 'Солянка', 'Суп Харчо', 'Уха', 'Щи'];
$arrayOfPastaAndPizza = ['Болньезе', 'Паста карбонара', 'Равиоли', 'Тесто для пиццы'];
$arrayOfSnacks = ['Бастурма', 'Горячие закуски', 'Заливное', 'Канапе', 'Лечо', 'Чипсы'];
$arrayOfSandwiches = ['Брускета', 'Гамбургер', 'Панини', 'Тосты', 'Хот-дог', 'Чизбургер'];
$arrayOfDrinks = ['Горячий шоколад', 'Квас', 'Кисель', 'Коктейли алкогольные', 'Морс', 'Сидр', 'Смузи'];
$arrayOfBroths = ['Куриный бульон', 'Овощной суп'];

$arrayofDishes = array_merge($arrayOfPreparedStuff, $arrayOfPastriesAndDesserts, $arrayOfMainDishes, $arrayOfBreakfasts, $arrayOfSalads, $arrayOfSoups, $arrayOfPastaAndPizza, $arrayOfSnacks, $arrayOfSandwiches, $arrayOfDrinks, $arrayOfBroths);

$factory->define(App\Dish::class, function (Faker $faker) use ($arrayofDishes) {
    return [
        'name' => $faker->unique()->randomElement($arrayofDishes)
    ];
});
