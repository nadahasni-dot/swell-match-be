<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        return response()->json([
            'message' => 'register success',
            'data' => $user,
        ], 201);
    }
}
