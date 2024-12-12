<?php

use App\Http\Controllers\AffiliatesController;
use App\Http\Controllers\CommissionsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticator;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/users');
})->middleware(Authenticator::class);

Route::middleware(Authenticator::class)->group(function () {
    Route::resource('/users', UsersController::class)->except('show');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}/toggle-active', [UsersController::class, 'toggleActive'])
        ->name('users.toggle-active');

    
    Route::resource('/affiliates', AffiliatesController::class)->except('show');
    Route::patch('/affiliates/{affiliate}/toggle-active', [AffiliatesController::class, 'toggleActive'])
        ->name('affiliates.toggle-active');

    Route::resource('/commissions', CommissionsController::class)->except('show, edit');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('signin');
Route::get('/logout', [UsersController::class, 'destroy'])->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');