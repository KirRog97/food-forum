<?php

namespace App\Http\Controllers;

use App\Post;
use App\Picture;
use Illuminate\Support\Facades\Session;
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
    public function index()
    {
        $posts = Post::orderBy('title', 'desc')->paginate(15);
        return view('posts.index')->with('posts', $posts);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title'        =>   'required',
            'description'  =>   'required',
            'instruction'  =>   'required',
            'TTC'          =>   'required|integer',
            'COP'          =>   'required|integer',
            'Kcal'         =>   'required|integer'
        ]);

        Post::create([
            'user_id'      =>  Auth::user()->id,
            'picture_id'   =>  session('post_picture'),
            'category_id'  =>  session('post_category_id'),
            'kitchen_id'   =>  session('post_kitchen_id'),
            'dish_id'      =>  session('post_dish_id'),
            'menu_id'      =>  session('post_menu_id'),
            'title'        =>  $request->title,
            'description'  =>  $request->description,
            'instruction'  =>  $request->instruction,
            'TTC'          =>  $request->TTC,
            'COP'          =>  $request->COP,
            'Kcal'         =>  $request->Kcal,
        ]);

        $request->session()->forget('download');
        $request->session()->forget('post_category_id');
        $request->session()->forget('post_kitchen_id');
        $request->session()->forget('post_dish_id');
        $request->session()->forget('post_menu_id');

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
        $post = Post::find($post->id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
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
