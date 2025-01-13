<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\IngredientRecipe;
use App\Models\Instruction;
use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::factory()
            ->count(5)
            ->hasAttached(
                // Docs: https://laravel.com/docs/8.x/database-testing#pivot-table-attributes
                // Here Laravel calling Recipe->ingredients()
                IngredientRecipe::factory()->count(rand(min: 2, max: 5)),
                [
                    'ingredient_id' => Ingredient::all()->random()->id,
                    'amount' => rand(min: 1, max: 36000),
                ]
            )->has(
                Instruction::factory()->count(12)
            )
            ->create();
    }
}
