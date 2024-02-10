<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Menu::select('id', 'name')->get());
    }
}
