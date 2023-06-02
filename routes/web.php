<?php

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
    return view('patient.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//role
Route::prefix('role')->name('role.')->group(function(){
    Route::get('/create',[\App\Http\Controllers\RoleController::class,'create'])->name('create');
    Route:: post('',[\App\Http\Controllers\RoleController::class,'store'])->name('store');
    Route::get('',[\App\Http\Controllers\RoleController::class,'index'])->name('index');
    Route:: get('/{id}',[\App\Http\Controllers\RoleController::class,'show'])->name('show');
    Route:: delete('/{id}',[\App\Http\Controllers\RoleController::class,'destroy'])->name('destroy');
    //route to edit data
    Route:: get('/{id}/edit',[\App\Http\Controllers\RoleController::class,'edit'])->name('edit');
    //route to update data
    Route:: put('/{id}',[\App\Http\Controllers\RoleController::class,'update'])->name('update');
});
Route::get('/patient/home',[\App\Http\Controllers\PatientContoller::class,'home'])->name('home');
Route::get('/registerDoctor',[\App\Http\Controllers\DoctorContoller::class,'doctorRegister'])->name('registerDoctor');
Route::post('',[\App\Http\Controllers\DoctorContoller::class,'request'])->name('doctor.request');



