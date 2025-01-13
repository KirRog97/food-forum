<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Make sure the number of creating seed equal or less than 11
     * Because 11 is number of $arrayofCategories length in factory
     *
     * (!!!)Make sure you set right second argument in RecipeFactory
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->count(11)
            ->create();
    }
}
