<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientContoller extends Controller
{
    public function home()
    {
        return view("patient.home");
    }

}
