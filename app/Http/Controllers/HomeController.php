<?php

namespace App\Http\Controllers;

use App\Models\backend\Appointment;
use App\Models\Backend\Doctor;
use App\Models\Backend\Patient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $approvedDoctors = Doctor::whereHas('user', function ($query) {
            $query->where('app_status', true);
        })->get()->count();
        $notapprovedDoctors = Doctor::whereHas('user', function ($query) {
            $query->where('app_status', false);
        })->get()->count();
        $patients = Patient::get()->count();
        $appointments = Appointment::get()->count();
        return view('home' ,compact('approvedDoctors','notapprovedDoctors','patients','appointments'));
    }
}
