<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class IngredientPostController extends Controller
{
    public function index(Post $post): JsonResponse
    {
        return response()->json($post->ingredients()->get());
    }
}
