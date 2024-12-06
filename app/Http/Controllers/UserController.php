<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdateUserRequest;
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

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->save();

        return Redirect::route('users.show', $user);
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
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
