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
            UsersTableSeeder::class,
            IngredientsTableSeeder::class,
            KitchensTableSeeder::class,
            CategoriesTableSeeder::class,
            DishesTableSeeder::class,
            MenusTableSeeder::class,
            PostsTableSeeder::class,
            IngredientPostTableSeeder::class
        ]);
    }
}
