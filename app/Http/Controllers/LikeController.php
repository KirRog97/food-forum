<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Take current like count.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function likeCount(Post $post)
    {
        return response()
            ->json(['likeCount' => $post->likeCount()], 200);
    }

    /**
     * Take current like status.
     * @param  \App\Post  $post
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function reactToPost(Request $request, Post $post)
    {
        return response()
            ->json(['reaction' => $request->user()->react($post)], 200);
    }
}
