<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;


Route::get('/home', function () {
    return response()->json(['message' => 'Welcome to the API home']);
});

Route::post('/register', [UserController::class, 'Register']);
Route::post('/login', [UserController::class, 'Login']);
Route::get('/users', [UserController::class, 'GetUsers']);
Route::get('/users/{id}', [UserController::class, 'getUser']);
Route::put('/users/{id}', [UserController::class, 'updateUser']);

Route::post('/services', [ServiceController::class, 'createService']); 
Route::get('/services', [ServiceController::class, 'getServices']);