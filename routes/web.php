<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\IndexController;
use App\Http\Controllers\web\RagistrtionController;
use App\Http\Controllers\web\LoginController;
use App\Http\Controllers\web\studentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace'=>'auth'],function(){
    Route::get('/Login',[LoginController::class,'loginPage'])->name('logins');
    Route::post('login',[LoginController::class,'login'])->name('login');
    Route::post('logout',[LoginController::class,'logout'])->name('logout');
});

Route::get('/', [IndexController::class, 'home'])->name('home');
Route::get('About', [IndexController::class, 'about'])->name('about');
Route::get('Lecturers', [IndexController::class, 'lecturers'])->name('lecturers');
Route::get('News', [IndexController::class, 'news'])->name('news');
Route::get('NewsDetails', [IndexController::class, 'newsDetails'])->name('newsdetails');
Route::get('Event', [IndexController::class, 'event'])->name('event');
Route::get('EventDetails', [IndexController::class, 'eventDetails'])->name('eventdetails');
Route::get('Gallery', [IndexController::class, 'gallery'])->name('gallery');
Route::get('Contact', [IndexController::class, 'contact'])->name('contact');
Route::get('Reserech', [IndexController::class, 'reserech'])->name('reserech');
Route::get('ReserechDetails', [IndexController::class, 'reserechDetails'])->name('reserechdetails');
Route::get('Faq', [IndexController::class, 'faq'])->name('faq');
Route::get('Store', [IndexController::class, 'store'])->name('store');


Route::get('Ragistration', [RagistrtionController::class, 'ragistration'])->name('ragistration');
Route::post('CheckEmail', [RagistrtionController::class, 'checkStudentEmail'])->name('checkstudentemail');
Route::post('CheckPhone', [RagistrtionController::class, 'checkStudentContactNo'])->name('checkstudentphone');
Route::post('StudentRagistration', [RagistrtionController::class, 'studentRag'])->name('studentrag');
Route::get('Course', [studentController::class, 'course'])->name('course');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('MarkSheet', [studentController::class, 'marksheet'])->name('marksheet');
    Route::post('AddMarkSheet', [studentController::class, 'addStudentMarks'])->name('addstudentmarks');
    Route::post('UpdateMarkSheet', [studentController::class, 'updateStudentMarks'])->name('updatestudentmarks');

    Route::get('UpdateProfile',[RagistrtionController::class,'profileUpdate'])->name('profile');
    Route::post('UpdateProfile',[RagistrtionController::class,'update'])->name('updateprofile');

    Route::get('ChangePassword', [RagistrtionController::class,'changePassword'])->name('changepassword');
    Route::post('ResetPassword', [RagistrtionController::class,'resetPassword'])->name('resetpassword');

    Route::post('AdmissionForm', [studentController::class, 'admissionform'])->name('admissionform');
    Route::post('AddAdmissionForm', [studentController::class, 'addAdminssionForm'])->name('addadmissionform');

    Route::get('MyAddmission',[studentController::class,'myAddmission'])->name('myaddmission');
    Route::post('confirmaddmission',[studentController::class,'confirmAddmission'])->name('confirmaddmission');


});