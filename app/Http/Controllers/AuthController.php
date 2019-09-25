<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Buka View Login
    public function index(){
    	return view('login');
    }

    //Buka View Dashboard
    public function dashboard(){
        return view('dashboard');
    }

    //Login dan Verifikasi Akun
    public function postlogin(Request $request){
    	if(Auth::attempt($request->only('email','password'))){
    		return redirect('/dashboard');
    	}
    	return redirect('/login');
    }

    //Logout
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
