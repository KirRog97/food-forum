<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Make sure the number of creating seed equal or less than 6
     * Because 6 is number of $arrayOfMenus length in factory
     *
     * (!!!)Make sure you set right second argument in RecipeFactory
     *
     * @return void
     */
    public function run()
    {
        Menu::factory()
            ->count(6)
            ->create();
    }
}
