<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\college\auth\LoginController;
use App\Http\Controllers\college\DashboardController;

Route::group(['namespace' => 'shop'], function () {
    Route::get('/', [LoginController::class, 'loginPage'])->name('logins');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware'=>'auth:college'],function(){

    Route::group(['prefix'=>'dashboard','as'=>'dashboard.'],function(){

        Route::get('/',[DashboardController::class,'index'])->name('index');
    });

});