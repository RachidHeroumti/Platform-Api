<?php

use App\Http\Controllers\MediaController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;


Route::get('/home', function () {
    return response()->json(['message' => 'Welcome to the API home']);
});

Route::post('/register', [UserController::class, 'Register']);
Route::post('/login', [UserController::class, 'Login']);
Route::get('/email/verify', function () {
    return '<h1>link verfication</h1>';
})->middleware('auth')->name('verification.notice');

Route::get('/users', [UserController::class, 'GetUsers'])->middleware('auth:api')->middleware('role:admin');
Route::get('/users/{id}', [UserController::class, 'getUser'])->middleware('auth:api')->middleware('role:admin');
Route::put('/users/{id}', [UserController::class, 'updateUser'])->middleware('auth:api')->middleware('role:admin,buyer,seller');


Route::get('/users/services/{id}', [UserController::class, 'getUserServices']);

Route::post('/services', [ServiceController::class, 'createService'])->middleware('auth:api'); 
Route::get('/services', [ServiceController::class, 'getServices']);
Route::get('/services/{id}', [ServiceController::class, 'getService'])->middleware('auth:api')->middleware('role:admin');

Route::post('/messages/send', [MessageController::class, 'sendMessage'])->middleware('auth:api')->middleware('role:admin,buyer,seller');
Route::get('/messages/user/{userId}', [MessageController::class, 'getUserMessages'])->middleware('auth:api')->middleware('role:admin,buyer,seller');

Route::post('/media/upload', [MediaController::class, 'uploadImgs']);
