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

        if (Auth::guard('admin')->attempt([
            'email' => $req->logemail,
            'password' => $req->logpass
        ]))
        {
            dd('done');
        }else {
            dd('else');
        }
        

    }

    function dashboard()
    {
        return view('admin.Dashboard');
    }
}
