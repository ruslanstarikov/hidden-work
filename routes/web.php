<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ConversionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyMemberController;
use App\Http\Controllers\InvitationsController;


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

Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
Route::get('/company/create', [CompanyController::class, 'form'])->name('companies.create');
Route::get('/company/edit/{id}', [CompanyController::class, 'form'])->name('companies.edit');
Route::get('/company/manage/{id}', [CompanyController::class, 'form'])->name('companies.manage.users');

Route::post('/company', [CompanyController::class, 'upsert'])->name('companies.store');
Route::put('/company/{id?}', [CompanyController::class, 'upsert'])->name('companies.update');
Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');
Route::post('/company/avatar/{id?}', [CompanyController::class, 'updateAvatar'])->name('companies.update.avatar');
Route::post('/company/background/{id?}', [CompanyController::class, 'updateBackground'])->name('companies.update.background');

Route::get('/companies/{company}/members', [CompanyMemberController::class, 'index'])->name('company.members.index');
Route::get('/companies/{company}/members/{member}/edit', [CompanyMemberController::class, 'edit'])->name('company.members.edit');
Route::put('/companies/{company}/members/{member}', [CompanyMemberController::class, 'update'])->name('company.members.update');
Route::delete('/companies/{company}/members/{member}', [CompanyMemberController::class, 'destroy'])->name('company.members.destroy');

Route::get('/companies/{company}/members/invite', [CompanyMemberController::class, 'inviteForm'])->name('company.members.invite.form');
Route::post('/companies/{company}/members/invite', [CompanyMemberController::class, 'invite'])->name('company.members.invite');
Route::delete('/companies/{company}/members/invite/{invitation}', [CompanyMemberController::class, 'destroyInvite'])->name('company.invitation.destroy');

Route::post('/invitation/{invitation}', [InvitationsController::class, 'accept'])->name('invitation.accept');
Route::delete('/invitation/{invitation}', [InvitationsController::class, 'reject'])->name('invitation.reject');
Route::get('/invitations', [InvitationsController::class, 'list'])->name('invitations.list');
