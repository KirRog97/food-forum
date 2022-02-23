<?php

namespace App\Http\Controllers;

use App\Models\IngredientPost;
use Illuminate\Http\Request;

class IngredientPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function saveInSession(Request $request)
    {
        $postIng = [];

        foreach ($request->added_ingredients as $key => $value) {
            $postIng[$key]['ingredient_id'] = $value['id'];
            $postIng[$key]['amount'] = $value['amount'];
        };

        $request->session()->put('post_ing', $postIng);

        return response()->json(null, 200);
    }
}
