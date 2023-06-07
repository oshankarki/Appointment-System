<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Backend\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovalNotification;


class SuperAdminContoller extends Controller
{
    public function approveDoctors()
    {
        $doctors = Doctor::whereHas('user', function ($query) {
            $query->where('role_id', 2);
        })->get();

        return view('doctors.view', ['doctors' => $doctors]);
    }

    public function toggleApproval($id)
    {
        $doctor = Doctor::find($id);
        $doctor->user->app_status = !$doctor->user->app_status;
        $doctor->user->save();
        return redirect()->back();
    }

}
