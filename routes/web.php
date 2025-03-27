<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LostFoundController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->group(function(){

        // admin
        Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        //Add items
        Route::resource('/admin/items',LostFoundController::class)->names('items');
        Route::get('/admin/item/found',[LostFoundController::class,'found'])->name('items.found');
        Route::get('/admin/item/seeStatus/{id}',[LostFoundController::class,'seeStatus'])->name('items.seeStatus');
        Route::post('/admin/item/changeStatus/{id}',[LostFoundController::class,'changeStatus'])->name('items.changeStatus');
        Route::get('/admin/item/claim',[LostFoundController::class,'viewclaim'])->name('items.viewclaim');
        Route::post('/admin/item/claimreview',[LostFoundController::class,'claimreview'])->name('items.claimreview');

    // user
    Route::get('/user/dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('/user/view/{id}',[UserController::class,'view'])->name('user.view');
    Route::get('/user/create',[UserController::class,'create'])->name('user.create');
    Route::post('/user/store',[UserController::class,'store'])->name('user.store');
    Route::post('/user/claim',[UserController::class,'claim'])->name('user.claim');
    Route::get('/auth/logout',[AuthController::class ,'logout'])->name('auth.logout');
});
// authentication
Route::get('/auth/register',[AuthController::class ,'register'])->name('auth.register');
Route::post('/auth/registerpost',[AuthController::class ,'registerpost'])->name('auth.registerpost');
Route::get('/',[AuthController::class ,'login'])->name('auth.login');
Route::post('/auth/loginpost',[AuthController::class ,'loginpost'])->name('auth.loginpost');
Route::get('/auth/forgot',[AuthController::class ,'forgot'])->name('auth.forgot');
Route::post('/auth/forgotpost',[AuthController::class ,'forgotpost'])->name('auth.forgotpost');
Route::get('/auth/reset/{token}',[AuthController::class ,'reset'])->name('auth.reset');
Route::post('/auth/resetpost/{token}',[AuthController::class ,'resetpost'])->name('auth.resetpost');




