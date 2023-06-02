<?php

namespace App\Http\Controllers;

use App\Models\Backend\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorContoller extends Controller
{
    public function doctorRegister()
    {
        return view('auth.registerDoctor');
    }

        public function request(Request $request)
    {
        // Save user data
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = "2";
        $user->save();

        // Save doctor data
        if($user)
        {
            $doctor = new Doctor();
            $doctor->user_id = $user->id;
            $doctor->license_no = $request->input('license_no');
            $doctor->department = $request->input('department');
            $doctor->save();
        }

        return view('auth.registerDoctor')->with('success', "Request Submitted Successfully");
    }

}
