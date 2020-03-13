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
     * (!!!)Make sure you set right second argument in PostFactory
     *
     * (!!!) 73 may work in single seed(db:seed) and throw error
     * in seed chain (migrate:fresh --seed)
     *
     * @return void
     */
    public function run()
    {
        factory(App\Dish::class, 70)->create();
    }
}
