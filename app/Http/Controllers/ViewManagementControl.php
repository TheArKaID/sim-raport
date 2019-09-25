<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewManagementControl extends Controller
{
    //View Dashboard
    public function dashboad(){
    	return view('dashboad');
    }

    //View Kelola Akun
    public function kelola_akun(){
    	$user = DB::table('users')->get();
    	return view('kelola_akun', compact('user'));
    }
}
