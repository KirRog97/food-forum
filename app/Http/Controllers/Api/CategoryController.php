<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Category::select('id', 'name')->get());
    }
}
