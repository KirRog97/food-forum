<?php

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
        factory(App\IngredientPost::class, 200)->create();
    }
}
