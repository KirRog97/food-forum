<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use App\Kitchen;
use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Container\Container;
// use Illuminate\Support\Facades\DB;


class RecipeSorting extends Controller
{
    public function getData()
    {
        if (Cache::has('fresh_list')) {
            $fresh_list = Cache::get('fresh_list');
        } else {
            Cache::remember('fresh_list', 60, function () {
                return Post::where('is_moderated', true)->max('created_at')->take(10);
            });
            $fresh_list = Cache::get('fresh_list');
        }

        if (Cache::has('popular_list')) {
            $popular_list = Cache::get('popular_list');
        } else {
            Cache::remember('popular_list', 60, function () {
                return Like::where('is_moderated', true)->max('like')->take(10);
            });
            $popular_list = Cache::get('popular_list');
        }

        if (Cache::has('recomendation_list')) {
            $recomendation_list = Cache::get('recomendation_list');
        } else {
            Cache::remember('recomendation_list', 60, function () {
                return Post::where('is_recomended', true)->take(10);
            });

            $recomendation_list = Cache::get('recomendation_list');
        }

        return $urlData = [
            'fresh_list' =>  $fresh_list, 'popular_list' =>  $popular_list,
            'recomendation_list' =>  $recomendation_list
        ];
    }
}
