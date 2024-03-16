<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[UserController::class, 'loadregister']);
Route::post('/register',[UserController::class, 'storeregister']);
Route::get('/remember-token/{token}',[UserController::class, 'verifynow']);
Route::get('/login',[UserController::class, 'loadlogin']);
Route::post('/login',[UserController::class, 'storelogin']);
Route::middleware('studentauth')->group(function(){
      Route::get('/dashboard',[UserController::class, 'dashboard']);
      Route::get('/logout',[UserController::class, 'logout']);
      Route::get('/classroom',[ClassroomController::class, 'loadclassroom']);
      Route::post('/classroom',[ClassroomController::class, 'storeclassroom']);
      Route::get('/classroom/view',[ClassroomController::class, 'classroomview']);
      Route::get('/classroom/edit/{id}',[ClassroomController::class, 'classroomedit']);
      Route::post('/classroom/edit/{id}',[ClassroomController::class, 'classroomupdate']);
      Route::get('/classroom/delete/{id}',[ClassroomController::class, 'classroomdelete']);
      Route::get('/student/add',[StudentController::class,'studentadd']);
      Route::post('/student/add',[StudentController::class,'studentstore']);
      Route::get('/student/view',[StudentController::class, 'studentview']);
      Route::get('/student/detail/{id}',[StudentController::class, 'studentdetail']);
      Route::get('/student/edit/{id}',[StudentController::class,'studentedit']);
      Route::post('/student/edit/{id}',[StudentController::class,'studentupdate']);
      Route::get('/student/delete/{id}',[StudentController::class,'studentdelete']);
});