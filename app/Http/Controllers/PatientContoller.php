<?php

namespace App\Http\Controllers;

use App\Models\backend\Appointment;
use App\Models\Backend\Doctor;
use Illuminate\Http\Request;

class PatientContoller extends Controller
{
    public function home(Request $request)
    {
        $department = $request->input('department');

        if (!empty($department)) {
            $data['doctors'] = Doctor::where('department', $department)->pluck('name', 'id');
        } else {
            $data['doctors'] = [];
        }

        return view("patient.home", compact('data'));
    }

}
