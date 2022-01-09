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
    
    //college
    Route::get('College','CollegeController@collegeIndex')->name('college');

    //course
    Route::get('Course','CourseController@courseIndex')->name('course');

    //meritround
    Route::get('MeritRound','MeritRoundController@MeritroundIndex')->name('meritround');

    //subject
    Route::get('Subject','SubjectController@subjectIndex')->name('subject');


});