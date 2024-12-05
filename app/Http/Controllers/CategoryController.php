<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Picture;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function create() : Response
    {
        return Inertia::render('Categories/Create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $picture = Picture::create([
            'path' => '/storage/' . $request->file->store('categories', 'public'),
            'mime' => $request->file->getMimeType(),
            'size' => $request->file->getSize()
        ]);

        Category::create([
            'name' => $request->name,
            'picture_id' => $picture->id,
            'description' => $request->description
        ]);

        return Redirect::route('home');
    }

    public function show(Category $category) : Response
    {
        return Inertia::render(
            'Categories/Show',
            [
                'category' => $category,
                'posts' => Post::where('menu_id', $category->id)
                    ->paginate(12)
            ]
        );
    }

    public function edit(Category $category) : Response
    {
        return Inertia::render(
            'Categories/Edit',
            [
                'category' => $category
            ]
        );
    }

    public function update(Request $request, Category $category) : RedirectResponse
    {
        $category->fill($request->validate([
            'name' => 'required',
            'description' => 'required',
        ]));

        $category->save();

        return Redirect::route('categories.show', $category);
    }

    public function destroy(Category $category) : RedirectResponse
    {
        $category->delete();
        return Redirect::route('home');
    }
}
