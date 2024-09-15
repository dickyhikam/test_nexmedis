<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/action_login', [AuthController::class, 'action_login'])->name('action_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/action_register', [RegisterController::class, 'action_register'])->name('action_register');

Route::middleware(['auth'])->group(function () {
    Route::get('/social_media', [DashboardController::class, 'index'])->name('social_media');
    Route::post('/upload', [DashboardController::class, 'store'])->name('upload');
    Route::post('/comment', [DashboardController::class, 'store_comment'])->name('comment');
    Route::post('/like', [DashboardController::class, 'store_like'])->name('like');
    Route::post('/unlike', [DashboardController::class, 'store_unlike'])->name('unlike');
});
