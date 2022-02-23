<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{


    /**
     * Display a listing of the users.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $users)
    {
        return Inertia::render(
            'Users/Index',
            [
                'users' =>  $users->orderBy('username', 'asc')
                    ->with('avatar')
                    ->paginate(9)
            ]
        );

        // return view(
        //     'users.index',
        //     [
        //         'users' => $user->orderBy('username', 'asc')->paginate(9)
        //     ]
        // );
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Users/Create');
        // return view('users.create');
    }

    /**
     * Display the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return Inertia::render(
            'Users/Show',
            [
                'user' => $user->load('avatar', 'posts')

            ]
        );

        // $user = $user->load('posts');
        // return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return Inertia::render(
            'Users/Edit',
            [
                'user' => $user
            ]
        );

        // return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        User::where('id', $user->id)
            ->update(array('username' => $request->username, 'email' => $request->email));

        return redirect()->route('posts.index')
            ->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified user from database.
     *
     * @param  \App\Models\User  $user
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function postsLikedByUser(User $user)
    {
        $posts = Post::query()
            ->whereReactedBy($user, 'Like')
            ->get();

        return Inertia::render(
            'Posts/IndexLikedByUser',
            [
                'posts' => $posts
            ]
        );

        // return view(
        //     'posts.index-liked-by-user',
        //     [
        //         'posts' => $posts
        //     ]
        // );
    }

    /**
     * Display a listing of the posts witch created by given user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function postsCreatedByUser(User $user)
    {
        $posts = Post::query()
            ->where('user_id', $user->id)
            ->paginate(10);

        return Inertia::render(
            'Posts/IndexCreatedByUser',
            [
                'posts' => $posts
            ]
        );

        // return view(
        //     'posts.index-created-by-user',
        //     [
        //         'posts' => $posts
        //     ]
        // );
    }
}
