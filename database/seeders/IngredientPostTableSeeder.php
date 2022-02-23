<?php

namespace Database\Seeders;

use App\Models\IngredientPost;
use Illuminate\Database\Seeder;

class IngredientPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IngredientPost::factory()
            ->count(5)
            ->create();

        // IngredientPost::factory()
        //     ->count(100)
        //     ->create();
    }
}
