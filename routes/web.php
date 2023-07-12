<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::get('/user', 'App\Http\Controllers\AuthController@user')->middleware('auth:api');
Route::get('/getuser', function (Request $request) {
    if (Auth::check()) {
        // User is logged in
        $user = Auth::user();
        return response()->json(['email' => $user->email]);
    } else {
        // User is not logged in
        return "aaaa";
        return response()->json(['message' => 'User is not logged in']);
    }
});

