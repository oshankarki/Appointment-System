<?php

namespace App\Http\Controllers;

use App\Models\backend\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function schedule()
    {
        return view("doctors.appointments.schedule");
    }
    public function store(Request $request)
    {
//        $appointments = new Appointment();
//        $appointments->doctor_id= Auth::user()->id;
//        $appointments->appointment_time= $request->input('appointment_time');
//        $appointments->appointment_date= $request->input('appointment_date');
//        $appointments->status= $request->input('status');
//        $appointments->save();
//        return redirect()->route('doctors.appointments.index');

    }
    public function index()
    {
        $records = Appointment::get();
        return view("doctors.appointments.index",compact('records'));
    }
    public function statusApproval($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = !$appointment->status;
        $appointment->save();

        return redirect()->back();
    }
}
