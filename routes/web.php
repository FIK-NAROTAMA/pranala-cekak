<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Login routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/reset', [App\Http\Controllers\Auth\ResetController::class, 'showResetForm'])->name('resetform');
Route::post('/reset', [App\Http\Controllers\Auth\ResetController::class, 'reset'])->name('reset');
Route::get('/reset/{token}', [App\Http\Controllers\Auth\ResetController::class, 'newPasswordForm'])->name('newpasswordForm');
Route::post('/newpassword', [App\Http\Controllers\Auth\ResetController::class, 'newpassword'])->name('newpassword');

Route::get('/', [App\Http\Controllers\LandingPage::class, 'index'])->name('home');
Route::get('/{uri}', [App\Http\Controllers\LandingPage::class, 'index']);

Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
