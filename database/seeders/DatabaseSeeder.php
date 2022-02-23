<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                KitchensTableSeeder::class,
                CategoriesTableSeeder::class,
                DishesTableSeeder::class,
                MenusTableSeeder::class,
                IngredientsTableSeeder::class,
                UsersTableSeeder::class,
                PostsTableSeeder::class,
                IngredientPostTableSeeder::class
            ]
        );

        Artisan::call('love:reaction-type-add', ['--name' => 'Like', '--mass' => 1]);
    }
}
