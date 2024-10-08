<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KompetisiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('layouts.home'); 
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'loginform'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

// Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'registerprocess'])->name('registerprocess');

route::get('/kompetisi', [KompetisiController::class, 'index']);
route::get('/kompetisi/create', [KompetisiController::class, 'create']);
route::post('/kompetisi/store', [KompetisiController::class, 'store']);
route::post('/kompetisi/update/{id}', [KompetisiController::class, 'update']);
route::get('/kompetisi/destroy/{id}', [KompetisiController::class, 'destroy']);

route::get('/user', [Usercontroller::class,'users'])->name('users/list');
route::post('/user/store', [Usercontroller::class,'store'])->name('users/store');
route::get('/user/create', [Usercontroller::class,'create']);
route::post('/user/update/{id}', [Usercontroller::class,'update']);
route::get('/user/destroy/{id}', [Usercontroller::class,'destroy']);
