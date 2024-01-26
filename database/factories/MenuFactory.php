<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    private $arrayOfMenus = ['Вегетарианская еда', 'Веганская еда', 'Детское меню', 'Низкоколорийная еда', 'Постная еда', 'Меню при диабете'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()
                ->randomElement($this->arrayOfMenus),
        ];
    }
}
