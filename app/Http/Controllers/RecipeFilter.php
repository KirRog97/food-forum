<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Category;
use App\Kitchen;
use App\Ingredient;
use Illuminate\Support\Facades\Cache;

class RecipeFilter extends Controller
{
    public function cacheCheck($list, $class)
    {
        if (Cache::has($list)) {
            return  $el_list = Cache::get($list);
        } else {
            $this->cacheRemember($list, $class);
            return  $el_list = Cache::get($list);
        };
    }

    public function cacheRemember($list, $class)
    {
        $arrToRemember = $class::all()->pluck('name');
        Cache::put($list, $arrToRemember, now()->addMinutes(30));
    }

    public function getData()
    {
        $ingredient_list =      $this->cacheCheck('Ingredient', Ingredient::class);
        $kitchen_list =         $this->cacheCheck('Kitchen', Kitchen::class);
        $dishes_list =          $this->cacheCheck('Dishes', Dish::class);
        $category_list =        $this->cacheCheck('Category', Category::class);

        return response()->json([
            'ingredient_list' =>  $ingredient_list, 'kitchen_list' =>  $kitchen_list,
            'dishes_list' =>  $dishes_list, 'category_list' =>  $category_list
        ]);
    }
}
