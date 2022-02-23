<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KitchenFactory extends Factory
{
    private array $arrayOfKitchens = ['Китайская', 'Мексиканская', 'Грузинская', 'Фрацузская', 'Японская', 'Индийская', 'Русская', 'Среднеземноморкая', 'Армянская', 'Тайская'];

    /** 
     * Define the model's default state.     
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement($this->arrayOfKitchens),
        ];
    }
}
