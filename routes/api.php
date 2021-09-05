<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('categories', 'Api\\CategoryController@index');
Route::get('ingredients', 'Api\\IngredientController@index');
Route::get('dishes', 'Api\\DishController@index');
Route::get('kitchens', 'Api\\KitchenController@index');
Route::get('menus', 'Api\\MenuController@index');


Route::group(['prefix' => 'posts'], function () {
    Route::get('/{post}/ingredients', 'Api\\IngredientPostController@index');
    Route::get('/new', 'Api\\PostController@new');
    Route::get('favorites/editor-choice', 'Api\\PostController@editorChoise');
    Route::get('/favorites/top', 'Api\\PostController@top');
});
