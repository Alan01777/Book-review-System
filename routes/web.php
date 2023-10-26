<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return redirect()->route('users.index');
});

Route::resource('books', BookController::class)->only(['index', 'show']);
Route::resource('books.reviews', ReviewController::class)->scoped(['review' => 'book']);
Route::resource('users', UserController::class);

Route::post('users/auth', [AuthController::class, 'auth'])->name('users.auth');
Route::post('users/logout', [AuthController::class, 'logout'])->name('users.logout');
