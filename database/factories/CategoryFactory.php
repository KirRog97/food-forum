<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    private array  $arrayOfCategories = ['Заготовки', 'Выпечка и десерты', 'Основные блюда', 'Завтраки', 'Салаты', 'Супы', 'Паста и пицца', 'Закуски', 'Сэндвичи',  'Напитки', 'Бульоны'];

    /**
     * 
     * Define the model's default state.
     *
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()
                ->randomElement($this->arrayOfCategories)
        ];
    }
}
