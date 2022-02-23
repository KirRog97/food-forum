<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KitchenResource;
use App\Models\Kitchen;
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
        return response()->json(Kitchen::select('id', 'name')->get());

        // return KitchenResource::collection(Kitchen::select('id', 'name')->get());
    }
}
