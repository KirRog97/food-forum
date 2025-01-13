<?php

namespace Database\Seeders;

use App\Models\IngredientRecipe;
use Illuminate\Database\Seeder;

class IngredientRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IngredientRecipe::factory()
            ->count(5)
            ->create();

        // IngredientRecipe::factory()
        //     ->count(100)
        //     ->create();
    }
}
