<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Auth\SessionGuard;
use Symfony\Component\HttpKernel\TerminableInterface;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->session()->flash('success','U right');
        $request->session()->put('user_data', Auth::user());
        return view('home');
    }
}
