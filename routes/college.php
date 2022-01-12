<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\college\auth\LoginController;
use App\Http\Controllers\college\DashboardController;
use App\Http\Controllers\college\CollegeCourseController;
use App\Http\Controllers\college\CollegeMeritController;

Route::group(['namespace' => 'shop'], function () {
    Route::get('/', [LoginController::class, 'loginPage'])->name('logins');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware'=>'auth:college'],function(){

    Route::group(['prefix'=>'dashboard','as'=>'dashboard.'],function(){

        Route::get('/',[DashboardController::class,'index'])->name('index');
    });

    //change password
    Route::get('ChangePassword', [DashboardController::class,'changePassword'])->name('changepassword');
    Route::post('ResetPassword', [DashboardController::class,'resetPassword'])->name('resetpassword');

    //update profile
    Route::get('UpdateProfile',[DashboardController::class,'profileUpdate'])->name('profile');
    Route::post('CollegeUpdateProfile',[DashboardController::class,'update'])->name('update');


    //college course
    Route::get('Collegecourse',[CollegeCourseController::class,'collegecourseIndex'])->name('collegecourse');
    Route::post('AddCollegecourse',[CollegeCourseController::class,'addCollegeCourse'])->name('addcollegecourse');
    Route::post('EditCollegeCourse',[CollegeCourseController::class,'editCollegeCourse'])->name('editcollegecurse');
    Route::post('UpdateCollegeCourse',[CollegeCourseController::class,'updateCollegeCourse'])->name('updatecollegecourse');
    Route::post('DeleteCollegeCourse',[CollegeCourseController::class,'deleteCollegeCourse'])->name('deletecollegecourse');

    // merit round
    Route::get('CollegeMerit',[CollegeMeritController::class,'collegemeritIndex'])->name('collegemerit');
    Route::post('SelectMeritRound',[CollegeMeritController::class,'selectMeritRound'])->name('selectmeritround');
    Route::post('addmeritround',[CollegeMeritController::class,'addMeritRound'])->name('addmeritround');
    Route::post('EditMeritRound',[CollegeMeritController::class,'editMeritRound'])->name('editmeritround');
    Route::post('UpdateMeritRound',[CollegeMeritController::class,'updateMeritRound'])->name('updatemeritround');
    Route::post('DeleteMeritRound',[CollegeMeritController::class,'deleteMeritRound'])->name('deletemeritround');

});