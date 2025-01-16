<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class UserEmailValidateController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json([
            'isEmailAvailable' => User::firstWhere('email', $request->email) ?
            false : true
        ], 200);
    }
}
