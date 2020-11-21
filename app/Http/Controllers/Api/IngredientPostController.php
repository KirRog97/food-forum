<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\IngredientPostResource;
use App\IngredientPost;
use App\Post;
use Illuminate\Http\Request;

class IngredientPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $post = Post::find($id);
        $postIngredients = $post->ingredients()->get();
        return response()->json($postIngredients);

        // return IngredientPostResource::collection($ingredients);
    }
}
