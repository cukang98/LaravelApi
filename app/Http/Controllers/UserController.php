<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getName(Request $request)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // User is logged in
            $user = Auth::user();
            $name = $user->name;

            return response()->json([
                'name' => $name,
            ], 200);
        } else {
            // User is not logged in
            return response()->json([
                'error' => 'User not logged in.',
            ], 401);
        }
    }
}
