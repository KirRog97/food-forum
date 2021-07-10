<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);

        $this->middleware('own.user', ['only' => [
            'edit',  'update', 'destroy'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('users.index', [
            'users' => $user->orderBy('username', 'asc')->paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = $user->load('posts');
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        User::where('id', $user->id)
            ->update(array('username' => Input::get('username'), 'email' => Input::get('email')));

        return redirect()->route('posts.index')
            ->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->route('posts.index')
            ->with('success', 'Рецепт удален');
    }

    /**
     * Display a listing of the posts witch liked by given user.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function postsLikedByUser(User $user)
    {
        $posts = Post::query()
            ->whereReactedBy($user, 'Like')
            ->get();

        return view('posts.index-liked-by-user', [
            'posts' => $posts
        ]);
    }

    /**
     * Display a listing of the posts witch created by given user.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function postsCreatedByUser(User $user)
    {
        $posts = Post::query()
            ->where('user_id', $user->id)
            ->get();

        return view('posts.index-created-by-user', [
            'posts' => $posts
        ]);
    }
}
