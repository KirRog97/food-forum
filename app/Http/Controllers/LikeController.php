<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Take current like count.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function likeCount(Post $post)
    {
        return response()
            ->json(['likes_count' => $post->getLikesCount()], 200);
    }

    /**
     * Take current like status.
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function isReactedByUser(Post $post)
    {
        return response()
            ->json(['liked' => $post->isReactedByUser(auth()->user())], 200);
    }

    /**
     * Using laravel-love reacter facade for make reaction.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function reactToPost(Request $request, Post $post)
    {
        return response()
            ->json(['reaction' => $request->user()->react($post)], 200);
    }
}
