<?php

namespace Database\Factories;


use App\Models\Category;
use App\Models\Dish;
use App\Models\Kitchen;
use App\Models\Menu;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /** 
     * Define the model's default state.     
     */
    public function definition(): array
    {
        return [
            'title'         =>   $this->faker->name,
            'user_id'       =>   User::select('id')->get()->random(),
            'picture_id'    =>   Picture::factory()->create(),
            'category_id'   =>   Category::select('id')->get()->random(),
            'kitchen_id'    =>   Kitchen::select('id')->get()->random(),
            'dish_id'       =>   Dish::select('id')->get()->random(),
            'menu_id'       =>   Menu::select('id')->get()->random(),
            'description'   =>   $this->faker->paragraphs($this->faker->numberBetween(3, 6), true),
            'instruction'   =>   $this->faker->text($this->faker->numberBetween(145, 255)),
            'TTC'           =>   $this->faker->numberBetween(1, 240),
            'COP'           =>   $this->faker->numberBetween(1, 12),
            'Kcal'          =>   $this->faker->numberBetween(100, 2500),
            'is_banned'     =>   0,
            'is_muted'      =>   0
        ];
    }
}
