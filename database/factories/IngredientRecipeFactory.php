<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientRecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipe_id' => Recipe::select('id')->get()->random(),
            'ingredient_id' => Ingredient::select('id')->get()->random(),
            'amount' => fake()->randomNumber(3)
        ];
    }
}
