<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth', [ 'except' => [
    //         'index', 'show'
    //     ]]);
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('title','desc') -> paginate(4);
        return view('posts.index') -> with('posts', $posts);
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

        $this ->validate($request, [
            'title' => 'required',
            'TTC' => 'required',
            'COP' => 'required|integer',
            'Kcal' => 'required|integer'
        ]);

        $post = new Post;
        $post ->author = Auth()->user()->id;
        $post ->title = $request -> input('title');
        $post ->TTC = $request -> input('TTC');
        $post ->COP = $request -> input('COP');
        $post ->Kcal = $request -> input('Kcal');
        $post ->save();

        return redirect()->route('posts', [
            session()->flash('success', 'Ваш рецепт успешно создан.')
        ]);
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
        // return view('posts.show', compact('post'));
        return view('posts.show') -> with('post', $post);
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
        return view('posts.edit') -> with('post', $post);
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
        $result = Post::where('id', $post->id)->update();
        if($result)
        {
            return redirect('post.index')->with('success', 'Post updated');
        }
        else
        {
            return back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $result = Post::where('id', $post->id)->delete();
        if($result)
        {
            return redirect('post.index')->with('success', 'Post destroyed');
        }
        else
        {
            return back()->with('error', 'Something went wrong');
        }
    }
}
