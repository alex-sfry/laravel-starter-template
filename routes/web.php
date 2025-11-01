<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/login', [LoginController::class, 'create'])->middleware('guest');
Route::post('/auth/login', [LoginController::class, 'store'])->middleware('guest');
Route::get('/auth/signup', [SignupController::class, 'create'])->middleware('guest');
Route::post('/auth/signup', [SignupController::class, 'store'])->middleware('guest');
Route::post('/auth/logout', [LoginController::class, 'destroy'])->middleware('auth');
Route::get('/', [SiteController::class, 'index']);
