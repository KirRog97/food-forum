<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'layouts.app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        // https://wiki.php.net/rfc/nullsafe_operator
        $user =  $request?->user()?->load('avatar:id,path');
        $sharedData = array_merge(
            parent::share($request),
            [
                'auth' => [
                    'user' => $user
                ],
            ]
        );

        return $sharedData;
    }
}
