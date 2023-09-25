<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ConversionController;

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
Route::post('/freelancer/image', [FreelancerController::class, 'updateImage'])->name('freelancer.update.image');
Route::get('/freelancer/image', [FreelancerController::class, 'getImage'])->name('freelancer.get.image');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
Route::get('/jobs/create', [JobController::class, 'form'])->name('jobs.create');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::post('/jobs/{id}/apply', [JobController::class, 'apply'])->name('jobs.apply');
Route::post('/jobs', [JobController::class, 'upsert'])->name('jobs.store');
Route::put('/jobs/{id?}', [JobController::class, 'upsert'])->name('jobs.update');
Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');
Route::get('/jobs/{id}/edit', [JobController::class, 'editForm'])->name('jobs.edit');

Route::get('/skills/search/{domain}', [SkillController::class, 'searchSkills'])->name('skills.search');
Route::post('/skill/{id}/{domain}', [SkillController::class, 'addSkill'])->name('skill.add');
Route::delete('/skill/{id}/{domain}', [SkillController::class, 'removeSkill'])->name('skill.add');
Route::get('/skills/current/{domain}', [SkillController::class, 'currentSkills'])->name('skills.current');

Route::post('/convert', [ConversionController::class, 'convert'])->name('convert');
Route::get('/converter', [ConversionController::class, 'converter'])->name('converter');
