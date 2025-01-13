<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Kitchen;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class KitchenController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Kitchens/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $picture = Picture::create([
            'path' => '/storage/'.$request->file->store('kitchens', 'public'),
            'mime' => $request->file->getMimeType(),
            'size' => $request->file->getSize()
        ]);

        Kitchen::create([
            'name' => $request->name,
            'picture_id' => $picture->id,
            'description' => $request->description
        ]);

        return Redirect::route('home');
    }

    public function show(Kitchen $kitchen): Response
    {
        return Inertia::render(
            'Kitchens/Show',
            [
                'kitchen' => $kitchen,
                'recipes' => Recipe::where('kitchen_id', $kitchen->id)
                    ->paginate(12)
            ]
        );
    }


    public function edit(Kitchen $kitchen)
    {
        return Inertia::render(
            'Kitchens/Edit',
            [
                'kitchen' => $kitchen
            ]
        );
    }


    public function update(Request $request, Kitchen $kitchen): RedirectResponse
    {
        $kitchen->fill($request->validate([
            'name' => 'required',
            'description' => 'required',
        ]));

        $kitchen->save();

        return Redirect::route('kitchens.show', $kitchen);
    }


    public function destroy(Kitchen $kitchen): RedirectResponse
    {
        $kitchen->delete();
        return Redirect::route('home');
    }
}
