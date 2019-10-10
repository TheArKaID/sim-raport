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
    public function delete(User $id){
        User::destroy($id->id);
        return redirect('/kelola_akun');
    }

    //Lihat Akun
    public function detail($id){
        $user = User::find($id);
        return view('kelola_akun.detail_akun', compact('user'));
    }

    //Update Akun
    public function update(Request $request,$id){
        $user = User::find($id);
        $user->update([
            'kd_guru' => $request->kd_guru,
            'email' => $request->username,
            'role' => $request->role,
            'avatar' => $request->avatar,
        ]);
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('picture/',$request->file('avatar')->getClientOriginalName());
            $user->avatar = $request->file('avatar')->getClientOriginalName();
            $user->save();
        }
        return redirect('/kelola_akun');
    }

    //Ubah Password
    public function changepass(Request $request,$id){
        $user = User::find($id);
        $user->update([
                'password' => Hash::make($request['newpassword'])
            ]);
        return redirect('/dashboard')->with('status','Password Berhasil Terubah!');
    }
}
