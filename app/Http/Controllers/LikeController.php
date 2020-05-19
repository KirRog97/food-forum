<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['reactToPost']]);
    }

    /**
     * Take current like count.
     *
     * @return \Illuminate\Http\Response
     */
    public function likeCount(Request $request)
    {
        $post = Post::find($request->post_id);
        $likeCount = $post->likeCount();

        return response()
            ->json(['likeCount' => $likeCount], 200);
    }

    /**
     * Take current like status.
     *
     * @return \Illuminate\Http\Response
     */
    public function isReactedByUser(Request $request)
    {
        $post = Post::find($request->post_id);
        $liked = $post->isReactedByUser($request->user());

        return response()
            ->json(['liked' => $liked], 200);
    }

    /**
     * Using laravel-love reacter facade for make reaction.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reactToPost(Request $request)
    {
        $post = Post::find($request->post_id);
        $reaction = $request->user()->react($post);

        return response()
            ->json(['reaction' => $reaction], 200);
    }
}
