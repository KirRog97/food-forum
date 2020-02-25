<?php

use Illuminate\Database\Seeder;

class KitchensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Make sure the number of creating seed equal or less than 10
     * Because 10 is number of $arrayofKitchens length in factory
     *
     * @return void
     */
    public function run()
    {
        factory(App\Kitchen::class, 10)->create();
    }
}
