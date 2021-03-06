<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('categories', 'Api\\CategoryController@index');
Route::get('ingredients', 'Api\\IngredientController@index');
Route::get('dishes', 'Api\\DishController@index');
Route::get('kitchens', 'Api\\KitchenController@index');
Route::get('menus', 'Api\\MenuController@index');

Route::get('posts/{id}/ingredients', 'Api\\IngredientPostController@index');