<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Ingredient;
use App\Models\IngredientPost;
use App\Models\Instruction;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()
            ->count(5)
            ->hasAttached(
                // Docs: https://laravel.com/docs/8.x/database-testing#pivot-table-attributes
                // Here Laravel calling Post->ingredients()
                IngredientPost::factory()->count(rand(min: 2, max: 5)),
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
