<?php

namespace Database\Factories;

use App\Models\Picture;
use Illuminate\Database\Eloquent\Factories\Factory;

class KitchenFactory extends Factory
{
    private array $arrayOfKitchens = ['Китайская', 'Мексиканская', 'Грузинская', 'Фрацузская', 'Японская', 'Индийская', 'Русская', 'Среднеземноморкая', 'Армянская', 'Тайская'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          =>  fake()->unique()->randomElement($this->arrayOfKitchens),
            'picture_id'    =>  Picture::factory()->create(),
            'description'   =>  fake()->paragraphs(fake()->numberBetween(3, 6), true)
        ];
    }
}
