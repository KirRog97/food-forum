<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            KitchensTableSeeder::class,
            CategoriesTableSeeder::class,
            DishesTableSeeder::class,
            MenusTableSeeder::class,
            IngredientsTableSeeder::class,
            UsersTableSeeder::class,
            // PostsTableSeeder::class,
            // IngredientPostTableSeeder::class
        ]);
    }
}
