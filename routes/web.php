<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// admin
Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
// user
Route::get('/user/dashboard',[UserController::class,'index'])->name('user.dashboard');
// authentication
Route::get('/auth/register',[AuthController::class ,'register'])->name('auth.register');
Route::get('/auth/login',[AuthController::class ,'login'])->name('auth.login');
Route::get('/auth/forgot',[AuthController::class ,'forgot'])->name('auth.forgot');
Route::get('/auth/reset',[AuthController::class ,'reset'])->name('auth.reset');

