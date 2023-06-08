<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {
        if (Auth::user()->role->name === 'patient') {
            return '/patient/home';
        } elseif (Auth::user()->role->name === 'doctor') {
            if (Auth::user()->app_status == 1) {
                return '/doctor/dashboard';
            } else {
                Auth::logout();
            }
        } elseif (Auth::user()->role->name === 'SuperAdmin') {
            return '/home';
        }
        else{
            Auth::logout();
        }
    }
}
