<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index(Post $posts): Response
    {
        return Inertia::render(
            'Posts/Index',
            [
                'posts' => $posts->orderBy('title', 'asc')
                    ->paginate(10)
            ]
        );
    }

    /**
     * Display a top-10 of the popular posts witch have more likes.
     *
     */
    public function popularPosts(Post $post): Response
    {
        return Inertia::render(
            'Posts/PostsPopular',
            [
                'posts' =>  $post->getPopularPosts()
            ]
        );
    }

    public function create(): Response
    {
        return Inertia::render('Posts/Create');
    }


    public function store(StorePost $request): RedirectResponse
    {
        $ingredients = session('post_ing');

        $post = Post::create(
            [
                'user_id'      =>  Auth::user()->id,
                'picture_id'   =>  session('picture_id'),
                'category_id'  =>  $request->post_category_id,
                'kitchen_id'   =>  $request->post_kitchen_id,
                'dish_id'      =>  $request->post_dish_id,
                'menu_id'      =>  $request->post_menu_id,
                'title'        =>  $request->title,
                'description'  =>  $request->description,
                'instruction'  =>  $request->instruction,
                'TTC'          =>  $request->TTC,
                'COP'          =>  $request->COP,
                'Kcal'         =>  $request->Kcal
            ]
        );

        foreach ($ingredients as $ingredient) {
            $post->ingredientPosts()->attach(
                1,
                [
                    'post_id' => $post->id,
                    'ingredient_id' => $ingredient['ingredient_id'],
                    'amount' => $ingredient['amount'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }

        $request->session()->forget('picture_id');
        $request->session()->forget('post_ing');

        return redirect()->route('posts.index')
            ->with('success', 'Ваш рецепт успешно создан');
    }


    public function show(Post $post): Response
    {
        return Inertia::render(
            'Posts/Show',
            [
                'post' => $post->loadMissing(
                    [
                        'category:id,name',
                        'kitchen:id,name',
                        'dish:id,name',
                        'menu:id,name',
                        'ingredientPosts.picture',
                        'pictures',
                        'user',
                    ]
                )
            ]
        );
    }


    public function edit(Post $post): Response
    {
        return Inertia::render(
            'Posts/Edit',
            [
                'post' => $post->loadMissing(
                    [
                        'category:id,name',
                        'kitchen:id,name',
                        'dish:id,name',
                        'menu:id,name',
                        'pictures:id,path',
                        'ingredientPosts.picture'
                    ]
                )
            ]
        );
    }

    public function update(UpdatePost $request, Post $post)
    {
        $post = Post::find($post->id);
        $post->title =          $request->input('title');
        $post->description =    $request->input('description');
        $post->COP =            $request->input('COP');
        $post->TTC =            $request->input('TTC');
        $post->Kcal =           $request->input('Kcal');
        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Внесенные изменения сохранены');
    }

    public function destroy(Post $post): RedirectResponse
    {
        Post::destroy($post->id);
        return redirect()->route('posts.index')
            ->with('success', 'Рецепт удален');
    }
}
