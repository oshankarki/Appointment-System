<?php

use App\Models\Backend\Doctor;
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
    $records = Doctor::all();
    return view("patient.home", compact('records'));
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//role
Route::prefix('role')->middleware('superAdmin')->name('role.')->group(function(){
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
Route::middleware('superAdmin')->group(function(){
    Route::get('/approvedDoctors',[\App\Http\Controllers\SuperAdminContoller::class,'approveDoctors'])->name('doctors.approve');
    Route::get('/doctors/{id}',[\App\Http\Controllers\DoctorController::class,'show'])->name('doctor.show');
    Route::patch('/toggle-approval/{id}', [\App\Http\Controllers\SuperAdminContoller::class, 'toggleApproval'])->name('toggle.approval');
});

Route::get('/registerDoctor',[\App\Http\Controllers\DoctorController::class,'doctorRegister'])->name('registerDoctor');
Route::post('doctor/request',[\App\Http\Controllers\DoctorController::class,'request'])->name('doctor.request');
Route::get('/patient/home',[\App\Http\Controllers\PatientContoller::class,'home'])->name('patients.home');

Route::middleware('patient')->group(function(){
    Route::get('/home/appointment', [\App\Http\Controllers\AppointmentController::class, 'makeAppointment'])->name('makeAppointment');
    Route::post('/request',[\App\Http\Controllers\PatientContoller::class,'store'])->name('appointmentRequest');
    Route:: get('/{id}',[\App\Http\Controllers\PatientContoller::class,'show'])->name('appointment.show');
});






Route::middleware('doctor')->group(function(){
    Route::get('/doctor/dashboard',[\App\Http\Controllers\DoctorController::class,'home'])->name('doctors.home');
    Route::get('/appointment/{id}/edit',[\App\Http\Controllers\AppointmentController::class,'edit'])->name('appointment.edit');
    Route::get('/appointment/schedule',[\App\Http\Controllers\AppointmentController::class,'schedule'])->name('doctors.appointments.schedule');
    Route::post('',[\App\Http\Controllers\AppointmentController::class,'store'])->name('doctors.appointments.store');
    Route::get('/doctor/appointments',[\App\Http\Controllers\AppointmentController::class,'index'])->name('doctors.appointments.index');
    Route::patch('/status-approval/{id}', [\App\Http\Controllers\AppointmentController::class, 'statusApproval'])->name('status.approval');
    Route:: delete('/{id}',[\App\Http\Controllers\AppointmentController::class,'destroy'])->name('appointments.destroy');
    Route:: put('/{id}',[\App\Http\Controllers\AppointmentController::class,'update'])->name('doctors.appointments.update');
});








