<?php

namespace App\Http\Controllers\Api;

use App\Models\Kitchen;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class KitchenController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Kitchen::select('id', 'name')->get());
    }
}
