<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Recipe;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\Picture;

class DishController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Dishes/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $picture = Picture::create([
            'path' => '/storage/'.$request->file->store('dishes', 'public'),
            'mime' => $request->file->getMimeType(),
            'size' => $request->file->getSize()
        ]);


        Dish::create([
            'name' => $request->name,
            'picture_id' => $picture->id,
            'description' => $request->description
        ]);

        return Redirect::route('home');
    }

    public function show(Dish $dish): Response
    {
        return Inertia::render(
            'Dishes/Show',
            [
                'dish' => $dish,
                'recipes' => Recipe::where('dish_id', $dish->id)
                    ->paginate(12)
            ]
        );
    }

    public function edit(Dish $dish): Response
    {
        return Inertia::render(
            'Dishes/Edit',
            [
                'dish' => $dish,
            ]
        );
    }

    public function update(Request $request, Dish $dish): RedirectResponse
    {
        $dish->fill($request->validate([
            'name' => 'required',
            'description' => 'required',
        ]));

        $dish->save();

        return Redirect::route('dishes.show', $dish);
    }

    public function destroy(Dish $dish): RedirectResponse
    {
        $dish->delete();
        return Redirect::route('home');
    }
}
