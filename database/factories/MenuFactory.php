<?php

namespace Database\Factories;

use App\Models\Picture;
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
            'name'          =>  fake()->unique()->randomElement($this->arrayOfMenus),
            'picture_id'    =>  Picture::factory()->create(),
            'description'   =>  fake()->paragraphs(fake()->numberBetween(3, 6), true)
        ];
    }
}
