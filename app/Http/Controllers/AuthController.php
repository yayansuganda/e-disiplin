<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auths.login');
    }


    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('nip', 'password')) && Auth::user()->id_role == '1')
        {
            return redirect('/admin');
        }
        else if(Auth::attempt($request->only('nip', 'password')) && Auth::user()->id_role == '2')
        {
            return redirect('/skpd');
        }
        else if(Auth::attempt($request->only('nip', 'password')) && Auth::user()->id_role == '3')
        {
            return redirect('/bidang');
        }
        else if(Auth::attempt($request->only('nip', 'password')) && Auth::user()->id_role == '4'){

            return redirect('/dashboard_pegawai');
        }
        return redirect('/');



        if (Auth::check() && Auth::user()->id_role == '1') {
            return('/dashboard');
        }
        elseif (Auth::check() && Auth::user()->role == '') {
            return('/dashboard_pegawai');
        }
        else {
            return('/admin');
        }


    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
