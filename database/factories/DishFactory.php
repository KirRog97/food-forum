<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{
    private array $arrayOfPreparedStuff = ['Варенье', 'Салаты на зиму', 'Соленья и консервация'];
    private array $arrayOfPastriesAndDesserts = ['Анма', 'Беляши', 'Бисквит', 'Бискотти', 'Блины', 'Брауни', 'Бублик', 'Булочки', 'Ватрушки', 'Вафли', 'Галетты', 'Кексы', 'Мусс', 'Слойки'];
    private array $arrayOfMainDishes = ['Бешбармак', 'Биточки', 'Бифштекс', 'Буженина', 'Гуляш', 'Кебаб', 'Пельмени', 'Роллы'];
    private array $arrayOfBreakfasts = ['Драники', 'Каши', 'Мюсли', 'Омлет', 'Сырники', 'Яичница'];
    private array $arrayOfSalads = ['Винегреты', 'Греческий салат', 'Мясные салаты', 'Овощные салаты', 'Оливье', 'Салат Цезарь', 'Фруктовые салаты'];
    private array $arrayOfSoups = ['Борщ', 'Гаспачо', 'Гороховый суп', 'Грибной суп', 'Мисо', 'Окрошка', 'Солянка', 'Суп Харчо', 'Уха', 'Щи'];
    private array $arrayOfPastaAndPizza = ['Болньезе', 'Паста карбонара', 'Равиоли', 'Тесто для пиццы'];
    private array $arrayOfSnacks = ['Бастурма', 'Горячие закуски', 'Заливное', 'Канапе', 'Лечо', 'Чипсы'];
    private array $arrayOfSandwiches = ['Брускета', 'Гамбургер', 'Панини', 'Тосты', 'Хот-дог', 'Чизбургер'];
    private array $arrayOfDrinks = ['Горячий шоколад', 'Квас', 'Кисель', 'Коктейли алкогольные', 'Морс', 'Сидр', 'Смузи'];
    private array $arrayOfBroths = ['Куриный бульон', 'Овощной суп'];

    private function getArrayOfDishes()
    {
        return array_merge(
            $this->arrayOfPreparedStuff,
            $this->arrayOfPastriesAndDesserts,
            $this->arrayOfMainDishes,
            $this->arrayOfBreakfasts,
            $this->arrayOfSalads,
            $this->arrayOfSoups,
            $this->arrayOfPastaAndPizza,
            $this->arrayOfSnacks,
            $this->arrayOfSandwiches,
            $this->arrayOfDrinks,
            $this->arrayOfBroths,
        );
    }

    /**
     * 
     * Define the model's default state.
     *
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()
                ->randomElement($this->getArrayOfDishes())
        ];
    }
}
