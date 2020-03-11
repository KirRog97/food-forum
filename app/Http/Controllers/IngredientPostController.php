<?php

namespace App\Http\Controllers;

use App\IngredientPost;
use Illuminate\Http\Request;

class IngredientPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Ingredient  $ingredient
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        $postIng = session('post_ing');

        IngredientPost::create([
            'post_id' => $postId,
            'ingredient_id' => $postIng->id,
            'amount' => $postIng->amount,
        ]);

        $request->session()->forget('post_ing');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IngredientPost  $IngredientPost
     * @return \Illuminate\Http\Response
     */
    public function show(IngredientPost $IngredientPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IngredientPost  $IngredientPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IngredientPost $IngredientPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IngredientPost  $IngredientPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(IngredientPost $IngredientPost)
    {
        //
    }
}
