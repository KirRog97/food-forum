<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KitchenResource;
use App\Kitchen;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kitchens = Kitchen::select('id', 'name')->get();
        return response()->json($kitchens);

        // return KitchenResource::collection($kitchens);
    }
}
