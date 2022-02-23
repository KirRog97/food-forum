<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\IngredientPostResource;
use App\Models\IngredientPost;
use App\Models\Post;
use Illuminate\Http\Request;

class IngredientPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return response()->json($post->ingredientPosts()->get());

        // return IngredientPostResource::collection($post->ingredientPosts()->get());
    }
}
