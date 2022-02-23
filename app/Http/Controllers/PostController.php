<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;


class PostController extends Controller
{

    /**
     * Display a listing of the posts.
     *
     * @param  \App\Models\Post  $post
     * @return \Inertia\Response
     */
    public function index(Post $posts)
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function popularPosts(Post $post)
    {
        return Inertia::render(
            'Posts/IndexCreatedByUser',
            [
                'posts' =>  $post->getPopularPosts()
            ]
        );

        // return view(
        //     'posts.index-liked-by-user',
        //     [
        //         'posts' => $post->getPopularPosts()
        //     ]
        // );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Posts/Create');

        // return view('posts.create');
    }

    /**
     * Store a newly created post in database.
     *
     * @param  App\Http\Requests\StorePost   $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
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

    /**
     * Display the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return Inertia::render(
            'Posts/Show',
            [
                'post' => $post->load([
                    'category',
                    'dish',
                    'ingredientPosts.picture',
                    'kitchen',
                    'menu',
                    'pictures',
                    'user',
                ])
            ]
        );
        // 
        // $post = $post->load('ingredientPosts');
        // return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render(
            'Posts/Edit',
            [
                'posts' => $post->load('pictures:id,path', 'ingredientPosts:id,name,amount')
            ]
        );

        // $post = $post->load('pictures:id,path', 'ingredientPosts:id,name,amount');
        // return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in database.
     *
     * @param  App\Http\Requests\UpdatePost $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified post from database.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect()->route('posts.index')
            ->with('success', 'Рецепт удален');
    }
}
