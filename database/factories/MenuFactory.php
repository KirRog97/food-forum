<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    private $arrayOfMenus = ['Вегетарианская еда', 'Веганская еда', 'Детское меню', 'Низкоколорийная еда', 'Постная еда', 'Меню при диабете'];

    /** 
     * Define the model's default state.     
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()
                ->randomElement($this->arrayOfMenus),
        ];
    }
}
