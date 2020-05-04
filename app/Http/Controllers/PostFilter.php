<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Category;
use App\Kitchen;
use App\Ingredient;
use App\Menu;
use Illuminate\Support\Facades\Cache;

class PostFilter extends Controller
{
    public function cacheCheck($array, $class)
    {
        if (Cache::has($array)) {
            return  $el_array = Cache::get($array);
        } else {
            $this->cacheRemember($array, $class);
            return  $el_array = Cache::get($array);
        };
    }

    public function cacheRemember($array, $class)
    {
        $arrToRemember = $class::all()->pluck('name', 'id');
        Cache::put($array, $arrToRemember, now()->addMinutes(30));
    }

    public function getData()
    {
        $ingredient_list =      $this->cacheCheck('Ingredient', Ingredient::class);
        $kitchen_list =         $this->cacheCheck('Kitchen', Kitchen::class);
        $dishes_list =          $this->cacheCheck('Dishes', Dish::class);
        $category_list =        $this->cacheCheck('Category', Category::class);
        $menu_list =            $this->cacheCheck('Menu', Menu::class);

        return response()->json([
            'ingredient_list'   =>  $ingredient_list,
            'kitchen_list'      =>  $kitchen_list,
            'dish_list'         =>  $dishes_list,
            'category_list'     =>  $category_list,
            'menu_list'         =>  $menu_list
        ]);
    }
}
