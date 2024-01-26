<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    private array  $arrayOfCategories = ['Заготовки', 'Выпечка и десерты', 'Основные блюда', 'Завтраки', 'Салаты', 'Супы', 'Паста и пицца', 'Закуски', 'Сэндвичи',  'Напитки', 'Бульоны'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()
                ->randomElement($this->arrayOfCategories)
        ];
    }
}
