<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::orderBy('name', 'desc')->paginate(10);
        return view('dishes.index')->with('dishes', $dishes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dishes.create');
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
            'name' => 'required'
        ]);

        $dish = new Dish;
        $dish->author = Auth()->user()->id;
        $dish->title = $request->input('title');
        $dish->TTC = $request->input('TTC');
        $dish->COP = $request->input('COP');
        $dish->Kcal = $request->input('Kcal');
        $dish->save();

        return redirect()->route('dishes.index')
            ->with('success', 'Ваш блюдо успешно создано');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        $dish = Dish::find($dish->id);
        return view('dishes.show')->with('dish', $dish);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $dish = Dish::find($dish->id);
        return view('dishes.edit')->with('dish', $dish);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $dish = Dish::find($dish->id);
        $dish->name = $request->input('name');
        $dish->save();

        return redirect()->route('dishes.index')
            ->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        Dish::destroy($dish->id);
        return redirect()->route('dishes.index')
            ->with('success', 'Рецепт удален');
    }
}
