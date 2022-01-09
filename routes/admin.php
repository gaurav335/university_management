<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;

Route::group(['namespace'=>'auth'],function(){
        Route::get('/','LoginController@loginPage')->name('logins');
        Route::post('login','LoginController@login')->name('login');
        Route::post('logout','LoginController@logout')->name('logout');
});

Route::group(['middleware'=>'auth:admin'],function(){

    Route::group(['prefix'=>'dashboard','as'=>'dashboard.'],function(){

        Route::get('/',[DashboardController::class,'index'])->name('index');
    });
    
});