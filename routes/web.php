<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::resource();

Route::controller(LoginController::class)->group(function () {
    Route::get('/auth/login', 'create')->middleware('guest')->name('login_index');
    Route::post('/auth/login', 'store')->middleware('guest')->name('login_store');
    Route::post('/auth/logout', 'destroy')->middleware('auth')->name('logout');
});
Route::controller(SignupController::class)->group(function () {
    Route::get('/auth/signup', 'create')->middleware('guest')->name('signup_index');
    Route::post('/auth/signup', 'store')->middleware('guest')->name('signup_store');
});

Route::get('/', [SiteController::class, 'index']);
