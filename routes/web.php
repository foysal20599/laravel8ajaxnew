<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [BaseController::class, 'index']);
Route::post('/upload', [BaseController::class, 'uploadU'])->name('upload');



Route::get('upload/form', [BaseController::class, 'uploadForm']);
Route::post('upload/form', [BaseController::class, 'uploadFormStore'])->name('upload.store');

Route::get('/form', [BaseController::class, 'formshow']);
Route::post('form/store', [BaseController::class, 'store'])->name('form.store');
Route::resource('student', StudentController::class);
Route::get('all/student', [StudentController::class, 'allData']);
Route::post('/student/store/', [StudentController::class, 'dataStore']);