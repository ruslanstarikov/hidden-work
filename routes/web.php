<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FreelancerController;

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
    });

Route::get('freelancer', [FreelancerController::class, 'freelancerForm'])->name('freelancer');
Route::post('freelancer', [FreelancerController::class, 'update'])->name('freelancer.update');
Route::get('/skills/search', [FreelancerController::class, 'searchSkills'])->name('skills.search');
Route::post('/skill/{id}', [FreelancerController::class, 'addSkill'])->name('skill.add');
Route::delete('/skill/{id}', [FreelancerController::class, 'removeSkill'])->name('skill.add');
Route::get('/skills/current', [FreelancerController::class, 'currentSkills'])->name('skills.current');
Route::post('/freelancer/image', [FreelancerController::class, 'updateImage'])->name('freelancer.update.image');
Route::get('/freelancer/image', [FreelancerController::class, 'getImage'])->name('freelancer.get.image');
