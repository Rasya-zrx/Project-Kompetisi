<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('layouts.app'); 
});

Route::get('app', [HomeController::class, 'index'])->name('app');

Route::get('login', [LoginController::class, 'loginform'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');


Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'registerprocess'])->name('registerprocess');


