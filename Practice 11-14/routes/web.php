<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLTEController;
use App\Http\Controllers\AdminLTEStudentController;
use App\Http\Controllers\StudentApiController;
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
//MODUL 12
Route::get('/student/create',[StudentController::class,'create'])->name('student.create')->middleware('login_auth');
Route::post('/student', [StudentController::class, 'store'])->name('student.store')->middleware('login_auth');
Route::get('/student', [StudentController::class, 'index'])->name('student.index')->middleware('login_auth');
Route::get('/student/{student}', [StudentController::class,'show'])->name('student.show')->middleware('login_auth');
Route::get('/student/{student}/edit', [StudentController::class,'edit'])->name('student.edit')->middleware('login_auth');
Route::patch('/student/{student}', [StudentController::class,'update'])->name('student.update')->middleware('login_auth');
Route::delete('/student/{student}', [StudentController::class,'destroy'])->name('student.destroy')->middleware('login_auth');





//MODUL 13
Route::get('/login', [AdminController::class,'index'])->name('login.index');
Route::get('/logout', [AdminController::class,'logout'])->name('login.logout');
Route::post('/login', [AdminController::class,'process'])->name('login.process');
Route::get('/admin/index', [AdminLTEController::class,'index'])->name('adminlte.index');

Route::get('/admin/create', [AdminLTEStudentController::class,'create'])
->name('adminlte.student.create');



//MODUL 14 DI FILE API.php

