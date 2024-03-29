<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::factory()
            ->count(10)
            ->create();

        // Ingredient::factory()
        //     ->count(100)
        //     ->create();
    }
}
