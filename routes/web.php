<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
Auth::routes(['verify' => true]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('email/verify/{id}/{hash}', function () {
    // This route is automatically handled by Laravel for email verification
})->name('verification.verify');

