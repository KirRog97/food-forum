<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class PostController extends Controller
{
    /**
     * Display a listing of the 10 most liked Posts.
     *
     */
    public function top(Post $post): Collection
    {
        return $post->getPopularPosts();
    }

    public function new(Post $post): Collection
    {
        return $post->getNewestPosts();
    }

    public function editorChoise(Post $post): Collection
    {
        return $post->getEditorsPosts();
    }
}
