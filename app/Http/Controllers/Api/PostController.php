<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the 10 most liked Posts.
     * 
     * @return \Illuminate\Http\Response
     */
    public function top(Post $post)
    {
        return $post->getPopularPosts();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new(Post $post)
    {
        return Post::orderBy('created_at')
            ->take(10)
            ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editorChoise(Post $post)
    {
        // Just a placeholder
        return Post::orderBy('user_id')
            ->take(10)
            ->get();
    }
}
