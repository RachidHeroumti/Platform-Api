<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/home', function () {
    return response()->json(['message' => 'Welcome to the API home']);
});

Route::post('/register', [UserController::class, 'Register']);

Route::post('/login', [UserController::class, 'Login']);

Route::get('/getusers', [UserController::class, 'GetUsers']);