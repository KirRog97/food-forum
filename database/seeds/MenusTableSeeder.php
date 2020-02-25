<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Make sure the number of creating seed equal or less than 6
     * Because 6 is number of $arrayOfMenus length in factory
     *
     * @return void
     */
    public function run()
    {
        factory(App\Menu::class, 6)->create();
    }
}
