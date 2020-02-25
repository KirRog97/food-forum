<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return view('posts.index', [
            'posts' => $post->getAscTitles()->paginate(16)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StorePost   $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request, IngredientPost $ingredientPost)
    {
        $ingredients = session('post_ing');
        $picture_id = session('post_picture');

        $post = Post::create([
            'user_id'      =>  Auth::user()->id,
            'picture_id'   =>  $picture_id,
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
        ]);

        foreach ($ingredients as $ingredient) {
            $post->ingredients()->attach(1, [
                'post_id' => $post->id,
                'ingredient_id' => $ingredient['ingredient_id'],
                'amount' => $ingredient['amount'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $request->session()->forget('post_picture');
        $request->session()->forget('post_ing');

        return redirect()->route('posts.index')
            ->with('success', 'Ваш рецепт успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::find($post->id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdatePost $request
     * @param  \App\Post  $post
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect()->route('posts.index')
            ->with('success', 'Рецепт удален');
    }
}
