<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Login routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('loginform');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('/', [App\Http\Controllers\LandingPage::class, 'index']);
Route::get('/{uri}', [App\Http\Controllers\LandingPage::class, 'index']);
Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
