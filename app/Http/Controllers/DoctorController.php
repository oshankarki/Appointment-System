<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Mail\ApprovalNotification;
use App\Models\Backend\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;


class DoctorController extends Controller
{
    public function doctorRegister()
    {
        return view('auth.registerDoctor');
    }

    public function request(DoctorRequest $request)
    {

        $randomPassword = Str::random(8);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password =Hash::make($randomPassword);
        $user->role_id = 2;
        $user->save();

        if($user)
        {
            $doctor = new Doctor();
            $doctor->user_id = $user->id;
            $doctor->license_no = $request->input('license_no');
            $doctor->department = $request->input('department');
            $doctor->save();
        }
        Mail::to($doctor->user->email)->send(new ApprovalNotification($randomPassword));


        return view('auth.registerDoctor')->with('success', "Request Submitted Successfully");
    }
    public  function show($id)
    {
        $data = Doctor::find($id);
        if (!$data) {
            request()->session()->flash('error', "Error:Invalid Request");
            return redirect()->route('doctors.view');

        }
        return view(('doctors.show'), compact('data'));
    }
    public  function home()
    {

        return view(('doctors.home'));
    }
    public  function profile()
    {
        return view(('superadmin.profile'));
    }
    public  function edit()
    {
        return view(('superadmin.edit'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('superadmin.profile')->with('success', 'Profile updated successfully');
    }
    public function changePassword()
    {

        return view('superadmin.password');
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

        return redirect()->route('superadmin.profile')->with('success', 'Password updated successfully');
    }

}
