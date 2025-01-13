<?php

namespace Database\Seeders;

use App\Models\Kitchen;
use Illuminate\Database\Seeder;

class KitchensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Make sure the number of creating seed equal or less than 10
     * Because 10 is number of $arrayofKitchens length in factory
     *
     * (!!!)Make sure you set right second argument in RecipeFactory
     *
     * @return void
     */
    public function run()
    {
        Kitchen::factory()
            ->count(10)
            ->create();
    }
}
