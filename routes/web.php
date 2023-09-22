<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function () {
        Route::get('login','loginForm');
        Route::post('login', 'login')->name('login');
        Route::get('register','registerForm')->name('register');
        Route::post('register', 'register');
        Route::get('logout', 'logout');
        Route::get('forgot', 'forgotForm')->name('password.request');
        Route::post('forgot', 'forgot')->name('password.forgot');
        Route::get('reset-password/{token}', 'resetForm')->name('password.reset');
        Route::post('reset/{token}', 'reset')->name('password.update');
        Route::get('profile', 'profile')->name('profile');
    });
