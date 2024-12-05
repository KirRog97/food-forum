<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    public function create() : Response
    {
        return Inertia::render('Menus/Create');
    }

    public function store(Request $request, Menu $menu) : RedirectResponse
    {
        $picture = Picture::create([
            'path' => '/storage/' . $request->file->store('menus', 'public'),
            'mime' => $request->file->getMimeType(),
            'size' => $request->file->getSize()
        ]);

        Menu::create([
            'name' => $request->name,
            'picture_id' => $picture->id,
            'description' => $request->description
        ]);

        return Redirect::route('home');
    }

    public function show(Menu $menu) : Response
    {
        return Inertia::render(
            'Menus/Show',
            [
                'menu' => $menu->load(
                    'picture:id,path'
                ),
                'posts' => Post::where('menu_id', $menu->id)
                    ->paginate(12)
            ]
        );
    }

    public function edit(Menu $menu) : Response
    {
        return Inertia::render(
            'Menus/Edit',
            [
                'menu' => $menu
            ]
        );
    }

    public function update(Request $request, Menu $menu) : RedirectResponse
    {
        $menu->fill($request->validate([
            'name' => 'required',
            'description' => 'required',
        ]));
        $menu->save();

        return Redirect::route('menus.show', $menu);
    }

    public function destroy(Menu $menu) : RedirectResponse
    {
        $menu->delete();
        return Redirect::route('home');
    }
}
