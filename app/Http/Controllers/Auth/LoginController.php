<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the user's input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            /** @var \App\Models\User $user **/
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;
            return response()->json([
                'username' => $user->name,
                'token' => $token,
                'message' => 'User Logged In Successfully',
                'email' => $request->email,
            ], 200);
        } else {
            // Authentication failed, redirect back with error message
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
    }
}
