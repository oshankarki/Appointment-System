<?php

namespace App\Http\Controllers;

use App\Models\backend\Appointment;
use App\Models\Backend\Doctor;
use App\Models\Backend\Patient;
use Illuminate\Http\Request;

class PatientContoller extends Controller
{
    public function home()
    {
        $data['records']=Appointment::all();
        return view("patient.home", compact('data'));
    }


    public function store(Request $request)
    {
//        dd($request->all());
        $user = auth()->user();
        $patient = $user->patient;
        if ($patient) {
            $appointment = new Appointment();
            $appointment->patient_id = $patient->id;
            $appointment->appointment_date = $request->input('appointment_date');
            $appointment->appointment_time = $request->input('appointment_time');
            $appointment->doctor_id = $request->input('doctor');
            $appointment->save();
        }

        return redirect()->back();
    }
    public function show($id)
    {
        $data = Appointment::findOrFail($id);
        return view("patient.show", compact('data'));

    }

}
