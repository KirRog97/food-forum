<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserOwnerRights
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
        // $recipe->author()->is($user);
        if (! $request->user()->hasOwnerRights($request->user->id)) {
            return redirect('/')->with('errors', 'Нет прав доступа');
        }
        return $next($request);
    }
}
