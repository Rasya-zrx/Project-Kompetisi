<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JuaraController;
use App\Http\Controllers\KompetisiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrasiController;

Route::get('/', function () {
    return view('auth.login'); 
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'loginform'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'registerprocess'])->name('registerprocess');

Route::get('/juara', [JuaraController::class, 'index']);
Route::post('/juara/store', [JuaraController::class, 'store']);
Route::get('/juara/peringkat', [JuaraController::class, 'lihatPeringkat']);
route::post('/juara/update/{id}', [JuaraController::class, 'update']);
route::get('/juara/destroy/{id}', [JuaraController::class, 'destroy']);
route::get('/juara/export', [JuaraController::class, 'view_pdf']);

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
route::get('/user/export', [Usercontroller::class,'view_pdf']);

route::get('/registrasi/{id_komp}', [RegistrasiController::class, 'index']);
route::get('/registrasi-list', [RegistrasiController::class, 'list']);
route::post('/registrasi/store', [RegistrasiController::class, 'store']);
route::get('/registrasi/create', [RegistrasiController::class, 'create']);
route::get('/registrasi/destroy/{id}', [RegistrasiController::class, 'destroy']);   