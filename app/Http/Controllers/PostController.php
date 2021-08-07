<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display a listing of the posts.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $post = Post::orderBy('title', 'asc')
            ->paginate(10);

        return view('posts.index', [
            'posts' => $post
        ]);
    }

    /**
     * Display a top-10 of the popular posts witch have more likes.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function popularPosts(Post $post)
    {
        return view('posts.index-liked-by-user', [
            'posts' => $post->getPopularPosts()
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
     * Store a newly created post in database.
     *
     * @param  App\Http\Requests\StorePost   $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $ingredients = session('post_ing');

        $post = Post::create([
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

        $request->session()->forget('picture_id');
        $request->session()->forget('post_ing');

        return redirect()->route('posts.index')
            ->with('success', 'Ваш рецепт успешно создан');
    }

    /**
     * Display the specified post.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = $post->load('ingredients');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = $post->load('pictures:id,path', 'ingredients:id,name,amount');
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in database.
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
     * Remove the specified post from database.
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
