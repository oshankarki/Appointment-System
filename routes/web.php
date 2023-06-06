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
Route::post('doctor/request',[\App\Http\Controllers\DoctorController::class,'request'])->name('doctor.request');
Route::get('/registerDoctor',[\App\Http\Controllers\DoctorController::class,'doctorRegister'])->name('registerDoctor');
Route::get('/patient/home',[\App\Http\Controllers\PatientContoller::class,'home'])->name('home');
Route::get('/approvedDoctors',[\App\Http\Controllers\SuperAdminContoller::class,'approveDoctors'])->name('doctors.approve');
Route::patch('/toggle-approval/{id}', [\App\Http\Controllers\SuperAdminContoller::class, 'toggleApproval'])->name('toggle.approval');
Route:: get('/{id}',[\App\Http\Controllers\DoctorController::class,'show'])->name('doctor.show');
Route::get('/doctor/dashboard',[\App\Http\Controllers\DoctorController::class,'home'])->name('home');



Route::get('/appointment/schedule',[\App\Http\Controllers\AppointmentController::class,'schedule'])->name('doctors.appointments.schedule');
Route::post('',[\App\Http\Controllers\AppointmentController::class,'store'])->name('doctors.appointments.store');
Route::get('/doctor/appointments',[\App\Http\Controllers\AppointmentController::class,'index'])->name('doctors.appointments.index');
Route::patch('/status-approval/{id}', [\App\Http\Controllers\AppointmentController::class, 'statusApproval'])->name('status.approval');
Route::get('/appointment/{id}/edit',[\App\Http\Controllers\AppointmentController::class,'edit'])->name('appointment.edit');
Route:: delete('/{id}',[\App\Http\Controllers\AppointmentController::class,'destroy'])->name('appointments.destroy');
Route:: put('/{id}',[\App\Http\Controllers\AppointmentController::class,'update'])->name('doctors.appointments.update');

Route::get('/home/appointment', [\App\Http\Controllers\AppointmentController::class, 'makeAppointment'])->name('makeAppointment');
Route::patch('/patient-status-approval/{id}', [\App\Http\Controllers\AppointmentController::class, 'patientsStatusApproval'])->name('patient.status.approval');
Route::patch('/patient/{id}/request', [\App\Http\Controllers\AppointmentController::class, 'makeRequest'])->name('patient.status.request');
// web.php (or routes/web.php) - Example route definition
Route::patch('/patient/{id}/approval', [\App\Http\Controllers\AppointmentController::class,'approval'])->name('patient.status.approval');
Route::post('',[\App\Http\Controllers\PatientContoller::class,'store'])->name('appointmentRequest');
Route::get('',[\App\Http\Controllers\PatientContoller::class,'index'])->name('patient.index');
Route:: get('/{id}',[\App\Http\Controllers\PatientContoller::class,'show'])->name('appointment.show');









