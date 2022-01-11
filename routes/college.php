<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\college\auth\LoginController;
use App\Http\Controllers\college\DashboardController;
use App\Http\Controllers\college\CollegeCourseController;

Route::group(['namespace' => 'shop'], function () {
    Route::get('/', [LoginController::class, 'loginPage'])->name('logins');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware'=>'auth:college'],function(){

    Route::group(['prefix'=>'dashboard','as'=>'dashboard.'],function(){

        Route::get('/',[DashboardController::class,'index'])->name('index');
    });

    //college course
    Route::get('Collegecourse',[CollegeCourseController::class,'collegecourseIndex'])->name('collegecourse');
    Route::post('AddCollegecourse',[CollegeCourseController::class,'addCollegeCourse'])->name('addcollegecourse');
    Route::post('EditCollegeCourse',[CollegeCourseController::class,'editCollegeCourse'])->name('editcollegecurse');
    Route::post('UpdateCollegeCourse',[CollegeCourseController::class,'updateCollegeCourse'])->name('updatecollegecourse');
    Route::post('DeleteCollegeCourse',[CollegeCourseController::class,'deleteCollegeCourse'])->name('deletecollegecourse');

});