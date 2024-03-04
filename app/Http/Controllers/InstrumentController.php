<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Instrument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreInstrumentRequest;
use App\Http\Requests\UpdateInstrumentRequest;

class InstrumentController extends Controller
{
    public function index(Instrument $instruments): Response
    {
        return Inertia::render(
            'Instruments/Index',
            [
                'instruments' =>  $instruments->orderBy('name', 'asc')
                    ->with('picture')
                    ->paginate(9)
            ]
        );
    }

    public function create(): Response
    {
        // if (Gate::forUser(Auth::user())->denies('create-instrument', $instrument)) {
        //     abort(403);
        // }

        return Inertia::render('Instruments/Create');
    }

    public function store(StoreInstrumentRequest $request)
    {
        // if (Gate::forUser(Auth::user())->denies('store-instrument', $instrument)) {
        //     abort(403);
        // }
    }


    public function show(Instrument $instrument): Response
    {

        return Inertia::render(
            'Instruments/Show',
            [
                'instrument' => $instrument->loadMissing('picture', 'instruction')
            ]
        );
    }

    public function edit(Instrument $instrument): Response
    {
        // if (Gate::forUser(Auth::user())->denies('edit-instrument', $instrument)) {
        //     abort(403);
        // }

        return Inertia::render(
            'Instruments/Edit',
            [
                'instrument' => $instrument->loadMissing('picture', 'instruction')
            ]
        );
    }

    public function update(UpdateInstrumentRequest $request, Instrument $instrument)
    {
        // if (Gate::forUser(Auth::user())->denies('destroy-instrument', $instrument)) {
        //     abort(403);
        // }
    }

    public function destroy(Instrument $instrument): RedirectResponse
    {
        // if (Gate::forUser(Auth::user())->denies('destroy-instrument', $instrument)) {
        //     abort(403);
        // }


        $instrument->delete();

        return Redirect::route('instruments.index');
    }
}
