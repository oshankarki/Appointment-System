<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\backend\Appointment;
use App\Models\Backend\Doctor;
use App\Models\Backend\Patient;
use App\Models\Backend\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientContoller extends Controller
{
    public function home()
    {
        $records = Doctor::whereHas('user', function ($query) {
            $query->where('app_status', true);
        })->get();
        return view("patient.home", compact('records'));
    }



    public function store(AppointmentRequest $request)
    {
        $user = auth()->user();
        $patient = $user->patient;
        if ($patient) {
            $appointment = new Appointment();
            $appointment->patient_id = $patient->id;
            $appointment->appointment_date = $request->input('appointment_date');
            $appointment->appointment_time = $request->input('appointment_time');
            $appointment->doctor_id = $request->input('doctor');
            $appointment->description= $request->input('description');

            $appointment->save();
        }
        return redirect()->back();
    }
    public function show($id)
    {
        $data = Appointment::findOrFail($id);
        return view("patient.show", compact('data'));
    }
    public  function profile()
    {
        return view(('patient.profile'));
    }
    public  function editPatient()
    {
        return view(('patient.edit'));
    }
    public function updatePatient(Request $request)
    {
        $user = Auth::user();
        $patient= Patient::where('user_id',Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        if ($request->hasFile('image')) {

            $previousImagePath = public_path('images/' . $user->patient->image);
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $patient->update([
                'image'=> $imageName,
            ]);
        }

        return redirect()->route('patient.profile')->with('success', 'Profile updated successfully');
    }
    public function changePassword()
    {

        return view('patient.password');
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

        return redirect()->route('patient.profile')->with('success', 'Password updated successfully');
    }
    public function destroy($id)
    {
        $role = Appointment::findOrFail($id);
        $role->delete();
        return redirect()->back()->with('success', 'Appointment Deleted successfully');
    }

}
