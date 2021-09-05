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
    public function index(Post $post)
    {
        return response()->json($post->ingredients()->get());

        // return IngredientPostResource::collection($post->ingredients()->get());
    }
}
