<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the 10 most liked Posts.
     * 
     */
    public function top(Post $post): Response
    {
        return $post->getPopularPosts();
    }

    public function new(Post $post): Response
    {
        return Post::orderBy('created_at')
            ->take(10)
            ->get();
    }


    public function editorChoise(Post $post): Response
    {
        // Just a placeholder
        return Post::orderBy('user_id')
            ->take(10)
            ->get();
    }
}
