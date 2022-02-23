<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientPostFactory extends Factory
{
    /** 
     * Define the model's default state.     
     */
    public function definition(): array
    {
        return [
            'post_id'        =>  Post::select('id')->get()->random(),
            'ingredient_id'  =>  Ingredient::select('id')->get()->random(),
            'amount'         =>  $this->faker->randomNumber(3)
        ];
    }
}
