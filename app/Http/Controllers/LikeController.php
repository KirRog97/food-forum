<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Take current like count.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function likeCount(Recipe $recipe)
    {
        return response()
            ->json(['likes_count' => $recipe->getLikesCount()], 200);
    }

    /**
     * Take current like status.
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function isReactedByUser(Recipe $recipe)
    {
        return response()
            ->json(['liked' => $recipe->isReactedByUser(auth()->user())], 200);
    }

    /**
     * Using laravel-love reacter facade for make reaction.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function reactToRecipe(Request $request, Recipe $recipe)
    {
        return response()
            ->json(['reaction' => $request->user()->react($recipe)], 200);
    }
}
