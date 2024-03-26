<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\About_us;
use Validator;


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

    function product()
    {
        return view('admin.product');
    }

    function contact()
    {
        return view('admin.contact');
    }

    function about()
    {   
        return view('admin.about_us');
    }

    function about_submit(Request $request){
        $request->validate([
            'about' => 'required'

        ]);
        $about_data = new About_us;
        $about_data->about = $request->about;
        $about_data->save();
        return redirect()->route('admin.about');
    }

    function testimonial()
    {
        return view('admin.testimonial');
    }



}
