<?php

namespace App\Http\Controllers;

use Auth;
use App\Kelas_ajar;
use Illuminate\Http\Request;

class KelolaProfileController extends Controller
{
    // View Profile
    public function profile(){
        $user = Auth::user()->kd_guru;
        $kelas_ajar = Kelas_ajar::select('kelas_ajars.*')
        ->where('kd_guru', $user)
        ->get();

        return view('profile', compact('kelas_ajar'));
    }
}
