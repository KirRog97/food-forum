<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(User $users): Response
    {
        return Inertia::render(
            'Users/Index',
            [
                'users' =>  $users->orderBy('username', 'asc')
                    ->with('avatar')
                    ->paginate(9)
            ]
        );
    }

    public function create(): Response
    {
        return Inertia::render('Users/Create');
    }

    public function show(User $user): Response
    {
        return Inertia::render(
            'Users/Show',
            [
                'user' => $user->load('avatar', 'posts')
            ]
        );
    }

    public function edit(User $user): Response
    {
        return Inertia::render(
            'Users/Edit',
            [
                'user' => $user->load('avatar:id,path')
            ]
        );
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        User::where('id', $user->id)
            ->update(array('username' => $request->username, 'email' => $request->email));

        return redirect()->route('posts.index')
            ->with('success', 'Изменения сохранены');
    }

    public function destroy(Request $request): RedirectResponse
    {
        User::destroy($user->id);
        return redirect()->route('posts.index')
            ->with('success', 'Рецепт удален');
    }

    public function postsLikedByUser(User $user): Response
    {
        $posts = Post::query()
            ->whereReactedBy($user, 'Like')
            ->get();

        return Inertia::render(
            'Posts/PostsLikedByUser',
            [
                'posts' => $posts
            ]
        );
    }

    public function postsCreatedByUser(User $user): Response
    {
        $posts = Post::query()
            ->where('user_id', $user->id)
            ->paginate(10);

        return Inertia::render(
            'Posts/PostsCreatedByUser',
            [
                'posts' => $posts
            ]
        );
    }
}
