<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Kitchen;
use App\Ingredient;
use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\DB;

class RecipeFilter extends Controller
{
    public function getData()
    {
        if (Cache::has('ingredient_list')) {
            $ingredient_list = Cache::get('ingredient_list');
        } else {
            Cache::rememberForever('ingredient_list', function () {
                return Ingredient::all();
            });
            $ingredient_list = Cache::get('ingredient_list');
        }

        if (Cache::has('kitchen_list')) {
            $kitchen_list = Cache::get('kitchen_list');
        } else {
            Cache::rememberForever('kitchen_list', function () {
                return Kitchen::all();
            });
            $kitchen_list = Cache::get('kitchen_list');
        }

        if (Cache::has('category_list')) {
            $category_list = Cache::get('category_list');
        } else {
            Cache::rememberForever('category_list', function () {
                return Category::all();
            });

            $category_list = Cache::get('category_list');
        }

        return $urlData = [
            'category_list' =>  $category_list, 'kitchen_list' =>  $kitchen_list,
            'ingredient_list' =>  $ingredient_list
        ];
    }

    // public function outputData($ingredient_list, $kitchen_list, $category_list)
    // {
    //     $urlData = [
    //         $ingredient_list, $kitchen_list, $category_list
    //     ];

    //     return dd(json_encode($urlData));
    // }

    // public function checkCache(String $string)
    // {
    //     if (Cache::has($string)) {
    //         return $string = Cache::get($string);
    //     } else {
    //         Cache::rememberForever($string, function () {
    //             return DB::table($tableName)->get();
    //         });
    //     }
    // }
}
