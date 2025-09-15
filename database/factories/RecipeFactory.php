<?php

namespace Database\Factories;


use App\Models\Category;
use App\Models\Dish;
use App\Models\Kitchen;
use App\Models\Menu;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name,
            'user_id' => User::select('id')->get()->random(),
            'picture_id' => Picture::factory()->create(),
            'category_id' => Category::select('id')->get()->random(),
            'kitchen_id' => Kitchen::select('id')->get()->random(),
            'dish_id' => Dish::select('id')->get()->random(),
            'menu_id' => Menu::select('id')->get()->random(),
            'description' => fake()->paragraphs(fake()->numberBetween(3, 6), true),
            'TTC' => fake()->numberBetween(1, 240),
            'COP' => fake()->numberBetween(1, 12),
            'Kcal' => fake()->numberBetween(100, 2500),
        ];
    }
}
