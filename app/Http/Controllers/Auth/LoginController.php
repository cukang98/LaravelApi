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
            // Authentication successful, redirect to home page or any other desired page
            return redirect('/home')->with('success', 'Login successful!');
        } else {
            // Authentication failed, redirect back with error message
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
}
