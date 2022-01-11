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
    Route::post('AddCollege','CollegeController@addCollege')->name('addcollege');
    Route::post('EditCollege', 'CollegeController@editCollege')->name('editcollege');
    Route::post('UpdateCollege', 'CollegeController@updateCollege')->name('updatecollege');
    Route::post('DeleteCollege', 'CollegeController@deleteCollege')->name('deletecollege');
    Route::post('StatusCollege', 'CollegeController@statusCollege')->name('statuscollege');
    Route::post('CheckEmail', 'CollegeController@checkEmail')->name('checkemail');
    Route::post('CheckContactNo', 'CollegeController@checkContactNo')->name('checkcontactno');


    //course
    Route::get('Course','CourseController@courseIndex')->name('course');
    Route::post('AddCourse','CourseController@addCourse')->name('addcourse');
    Route::post('EditCourse', 'CourseController@editCourse')->name('editcourse');
    Route::post('UpdateCourse', 'CourseController@updateCourse')->name('updatecourse');
    Route::post('DeleteCourse', 'CourseController@deleteCourse')->name('deletecourse');
    Route::post('StatusCourse', 'CourseController@statusCourse')->name('statuscourse');

    //meritround
    Route::get('MeritRound','MeritRoundController@MeritroundIndex')->name('meritround');

    //subject
    Route::get('Subject','SubjectController@subjectIndex')->name('subject');
    Route::post('AddSubject','SubjectController@addSubject')->name('addsubject');
    Route::post('EditSubject','SubjectController@editSubject')->name('editsubject');
    Route::post('UpdateSubject','SubjectController@updateSubject')->name('updatesubject');
    Route::post('DeleteSubject','SubjectController@deleteSubject')->name('deletesubject');



});