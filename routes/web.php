<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\IndexController;
use App\Http\Controllers\web\RagistrtionController;

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

Route::get('/', [IndexController::class, 'home'])->name('home');
Route::get('Ragistration', [RagistrtionController::class, 'ragistration'])->name('ragistration');
Route::post('CheckEmail', [RagistrtionController::class, 'checkStudentEmail'])->name('checkstudentemail');
Route::post('CheckPhone', [RagistrtionController::class, 'checkStudentContactNo'])->name('checkstudentphone');
Route::post('StudentRagistration', [RagistrtionController::class, 'studentRag'])->name('studentrag');

