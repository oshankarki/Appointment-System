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

        $doctorId = Auth::user()->doctor->id;
        $records = Appointment::where('doctor_id', $doctorId)->get();

        return view("doctors.appointments.index", compact('records'));
    }
    public function statusApproval($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = !$appointment->status;
        $appointment->save();
        if($appointment->status==1)
        {
            return redirect()->back()->with('success', "Patient Approved Successfully");

        }
        else{
            return redirect()->back()->with('success', "Patient Unapproved");

        }

    }
    public function edit($id)
    {
        $data['record'] = Appointment::find($id);

        return view(('doctors.appointments.edit'), compact('data'));
    }
    public function update(Request $request,$id)
    {
        $data['record'] = Appointment::find($id);
        if (!$data['record']) {
            request()->session()->flash('error', "Error: Invalid Request");
            return redirect()->route('doctors.appointments.index');
        }

        $data['record']->prescription = $request->input('prescription');
        $updated = $data['record']->save();

        if ($updated) {
            return redirect()->route('doctors.appointments.index')->with('success', 'Appointment updated successfully');
        } else {
            return redirect()->back()->withErrors('Appointment updation failed');
        }
    }
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->back()->with('success', 'Appointment Deleted successfully');
    }
    public function makeAppointment()
    {
        $data['records'] = Doctor::whereHas('user', function ($query) {
            $query->where('app_status', true);
        })->get();
        $patient_id = auth()->user()->patient->id;
        $appointment_count = Appointment::where('patient_id', $patient_id)->count();
        $appointment = Appointment::where('patient_id', $patient_id)->get();
        return view("patient.appointment", compact('data','appointment_count','appointment'));
    }
    public  function profile()
    {
        return view(('doctors.profile'));
    }
    public  function editDoctor()
    {
        return view(('doctors.edit'));
    }
    public function updateDoctor(Request $request)
    {
        $user = Auth::user();
        $doctor = Doctor::where('user_id',Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        if ($request->hasFile('image')) {
            // Delete previous image
            $previousImagePath = public_path('images/' . $user->doctor->image);
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $doctor->update([
                'image'=> $imageName,
                'license_no'=>$request->license_no,
                'department'=>$request->department,
            ]);
        }

        return redirect()->route('doctor.profile')->with('success', 'Profile updated successfully');
    }
    public function changePassword()
    {
        return view('doctors.password');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password',
        ]);
        $user = Auth::user();
        if (!password_verify($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors( 'Invalid old password');
        }
        $user->password = bcrypt($request->input('new_password'));
        $user->save();
        return view('doctors.profile')->with('success', 'Password updated successfully');
    }
}
