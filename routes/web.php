<?php

use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');

Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class);
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
