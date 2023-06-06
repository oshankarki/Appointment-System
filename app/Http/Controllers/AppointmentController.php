<?php

namespace App\Http\Controllers;

use App\Models\backend\Appointment;
use App\Models\Backend\Doctor;
use App\Models\Backend\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function schedule()
    {
        return view("doctors.appointments.schedule");
    }
    public function store(Request $request)
    {
        $doctor = Doctor::where('user_id',auth()->user()->id)->first();
        $appointments = new Appointment();
        $appointments->doctor_id =$doctor->id ;
        $appointments->appointment_time= $request->input('appointment_time');
        $appointments->appointment_date= $request->input('appointment_date');
        $appointments->save();
        return redirect()->route('doctors.appointments.index');

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
    public function edit($id)
    {
        $data['record'] = Appointment::find($id);

        return view(('doctors.appointments.edit'), compact('data'));
    }
    public function update(Request $request,$id)
    {
        $data['record']=Appointment::find($id);
        if(!$data['record' ]){
            request()->session()->flash('error',"Error:Invalid Request");
            return redirect()->route('doctors.appointments.index');
        }
        $record=$data['record']->update($request->all());
        if($record)
        {
            return redirect()->route('doctors.appointments.index')->with('success', 'Appointment Updated successfully');
        }else{
            return redirect()->back()->withErrors('Appointment Updation Failed');

        }
        return redirect()->route('doctors.appointments.index');
    }
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->back()->with('success', 'Appointment Deleted successfully');
    }
    public function makeAppointment()
    {
        $data['records'] = Appointment::all();

        return view("patient.appointment", compact('data'));
    }


}