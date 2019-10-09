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
            KitchensTableSeeder::class,
            IngredientsTableSeeder::class,
            CategoriesTableSeeder::class,
            DishesTableSeeder::class,
            PostsTableSeeder::class
        ]);
    }
}
