<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::post('/login', [LoginController::class, 'check'])->name('login');

  Route::get('/register', [RegistrationController::class, 'index'])->name('register');
  Route::post('/register', [RegistrationController::class, 'register'])->name('register');;
});

Route::middleware('auth')->group(function () {
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});