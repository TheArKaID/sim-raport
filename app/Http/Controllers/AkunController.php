<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    //Membuat Akun Baru
    public function create(Request $request){
    	User::create([
    		'kd_guru' => $request['kd_guru'],
            'name' => $request['name'],
            'role' => $request['role'],
            'email' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/kelola_akun');
    }

    //Menghapus Akun
    public function delete(User $user){
        User::destroy($user->id);
        return redirect('/kelola_akun');
    }

    //Lihat Akun
    public function detail(){
        $user = DB::table('users')->get();
        return view('detail_akun', compact('user'));
    }
}
