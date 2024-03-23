<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    function home(){
        return view('front.home');
    } 

    function registration(){
        return view('front.registration');
    }

    function registration_submit(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm' => 'required'
        ]);

        $logindata = new User;
        $logindata->name = $request->name;
        $logindata->email = $request->email;
        $logindata->password = $request->password;
        $logindata->save();
        $request->session()->put('logindata',$request->name);
        

        return view('front.home');
    }

    function login(){
        return view('front.login');
    }

    function login_submit(Request $request){
        $request->validate([
                    'password' => 'required',
                    'email' => 'required'
                ]);
            if(Auth::attempt([
                 "email" =>$request->email, 
                "password" => $request->password
            ])){
                $logindata = User::where("email",$request->email)->get();
                
                $request->session()->put('logindata' , $logindata[0]->name);
                
                return redirect()->route('front.home');
                 }
                 else{
                     return redirect()->route('front.login')->with('message', 'Credintials are not correct');
                    }
        
    }

    function product(){
        return view('front.product');
    }

    function card(Request $request){
       
        return view('front.card');

    }

    function without_login_card(){
        return view('front.without_login_card');
    }

    function contact(){
        return view('front.contact');
    }

    function about(){
        return view('front.about');
    }

    function blog_list(){
        return view('front.blog_list');
    }

    function testimonial(){
        return view('front.testimonial');
    }
    function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        
     
        return redirect()->route('front.login');
    }

    function product_details(){
        return view('front.product_details');
    }
}
