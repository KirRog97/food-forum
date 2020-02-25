<?php

use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Make sure the number of creating seed equal or less than 73
     * Because 73 is number of $arrayofDishes length in factory
     *
     * @return void
     */
    public function run()
    {
        factory(App\Dish::class, 73)->create();
    }
}
