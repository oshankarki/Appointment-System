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
Route::get('',[\App\Http\Controllers\DoctorController::class,'request'])->name('doctor.request');
Route::post('',[\App\Http\Controllers\DoctorController::class,'request'])->name('doctor.request');
Route::get('/patient/home',[\App\Http\Controllers\PatientContoller::class,'home'])->name('home');
Route::get('/registerDoctor',[\App\Http\Controllers\DoctorController::class,'doctorRegister'])->name('registerDoctor');
Route::get('/approvedDoctors',[\App\Http\Controllers\SuperAdminContoller::class,'approveDoctors'])->name('doctors.approve');
Route::patch('/toggle-approval/{id}', [\App\Http\Controllers\SuperAdminContoller::class, 'toggleApproval'])->name('toggle.approval');
Route:: get('/{id}',[\App\Http\Controllers\DoctorController::class,'show'])->name('doctor.show');
Route::get('/doctor/dashboard',[\App\Http\Controllers\DoctorController::class,'home'])->name('home');



Route::get('/appointment/schedule',[\App\Http\Controllers\AppointmentController::class,'schedule'])->name('doctors.appointments.schedule');
Route::post('',[\App\Http\Controllers\AppointmentController::class,'store'])->name('doctors.appointments.store');
Route::get('/doctor/appointments',[\App\Http\Controllers\AppointmentController::class,'index'])->name('doctors.appointments.index');
Route::patch('/status-approval/{id}', [\App\Http\Controllers\AppointmentController::class, 'statusApproval'])->name('status.approval');






