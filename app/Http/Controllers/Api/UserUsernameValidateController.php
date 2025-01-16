<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class UserUsernameValidateController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json([
            'isUsernameAvailable' => User::firstWhere('username', $request->username) ?
            false : true
        ], 200);
    }
}
