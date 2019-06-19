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


        $post =                 new Post;
        $post->user_id =        Auth::user()->id;
        $download =             $request->session()->get('download');

        $picture = Picture::create([
            'path'          =>  $download['path'],
            'mime'          =>  $download['mime'],
            'size'          =>  $download['size']
        ]);

        $post->picture_id =     $picture->id;
        $picture->save();
        // $post->category_id =    $request->session()->get('category_id');
        // $post->kitchen_id =     $request->session()->get('kitchen_id');
        // $post->dish_id =        $request->session()->get('dish_id ');
        $post->category_id =    1;
        $post->kitchen_id =     1;
        $post->dish_id =        1;

        $post->title =          $request->input('title');
        $post->description =    $request->input('description');
        $post->instruction =    $request->input('instruction');
        $post->TTC =            $request->input('TTC');
        $post->COP =            $request->input('COP');
        $post->Kcal =           $request->input('Kcal');
        $post->save();

        $request->session()->forget('download');

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
