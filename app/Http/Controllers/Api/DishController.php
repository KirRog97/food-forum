<?php

namespace App\Http\Controllers\Api;

use App\Models\Dish;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class DishController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Dish::select('id', 'name')->get());
    }
}
