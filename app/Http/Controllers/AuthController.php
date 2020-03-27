<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Buka View Login
    public function login()
    {
        $check_user = User::count();

    	return view('login', compact('check_user'));
    }

    // Akun Pertama (ADMIN)
    public function first_account(Request $request)
    {
        User::create([
            'kd_guru' => 'G0001',
            'avatar' => 'user.png',
            'name' => $request['nama'],
            'role' => 'Kurikulum',
            'kd_mapel' => '-',
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'remember_token' => Str::random(40),
        ]);

        Session::flash('save', 'Akun berhasil dibuat');
        return redirect('/login');
    }

    // Login dan Verifikasi Akun
    public function verif_login(Request $request)
    {
    	if(Auth::attempt($request->only('username', 'password'))){
    		return redirect('/dashboard');
    	}

        Session::flash('gagal','Username atau password anda salah');
    	return redirect('/login');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
