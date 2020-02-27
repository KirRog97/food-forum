<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPostOwnerRights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->hasOwnerRights($request->post->user_id)) {
            return redirect('/')->with('errors', 'Нет прав доступа');
        }
        return $next($request);
    }
}
