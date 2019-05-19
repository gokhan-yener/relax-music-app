<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            $user->api_token = Str::random(60);
            $user->save();
            return response()->json([
                'status' => 200,
                'api_token' => $user->api_token,
                'username' => $user->name,
                'email' => $user->email,
                'id' => $user->id
            ]);

        }
        return response()->json([
            'status' => 401,
            'message' => 'Unauthenticated.'
        ]);
    }

    public function user()
    {
        $user = Auth::guard('api')->user();
        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthenticated.'
            ]);
        }
        return $user;
    }
}
