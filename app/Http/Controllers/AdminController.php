<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    function login()
    {
        return view('admin.login');
    }

    function login_submit(Request $req)
    {
        $req->validate([
            'logemail' => 'required',
            'logpass' => 'required'
        ]);
        $data = [
            'email' => $req->logemail,
            'password' => $req->logpass
        ];
        //dd($data);
        if (Auth::guard('deep')->attempt($data))
        {
           return redirect()->route('admin.dashboard');
        }else {
            return redirect()->route('admin.login');
        }
        

    }

    function dashboard()
    {
        return view('admin.Dashboard');
    }
}
