<?php

namespace App\Http\Controllers;

use App\User;
use App\Mapel;
use App\KelasAjar;
use App\CrudKelas;
use App\TabelAjar;
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
            'mapel' => $request['mapel'],
            'email' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);

        echo "sukses";
    }

    //Menghapus Akun
    public function delete($id){
        DB::table('users')->where('kd_guru', '=', $id)->delete();
        DB::table('kelas_ajar')->where('kd_guru', '=', $id)->delete();
        echo "sukses";
    }

    public function detail_sample($id){
        $user = User::find($id);
        $mapel = Mapel::all();
        $kelas = CrudKelas::all();
        $t_ajar = TabelAjar::all();
        $tingkat1 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 1)->get();
        $tingkat2 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 2)->get();
        $tingkat3 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 3)->get();
        return view('kelola_akun.detail_akun', compact('user', 'mapel', 'kelas', 't_ajar', 'tingkat1', 'tingkat2', 'tingkat3'));
    }

    //Lihat Akun
    public function detail($id){
        $user = User::find($id);
        $mapel = Mapel::all();
        $kelas = CrudKelas::all();
        $t_ajar = TabelAjar::all();
        $tingkat1 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 1)->get();
        $tingkat2 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 2)->get();
        $tingkat3 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 3)->get();
        return response()->json($user);
    }

    //Update Akun
    public function update(Request $request,$id){
        $user = User::find($id);
        $image = $request->avatar;
        if($image != ''){
            $user->update([
                'kd_guru' => $request->kd_guru,
                'name' => $request->name,
                'email' => $request->username,
                'role' => $request->role,
                'mapel' => $request->mapel,
                'avatar' => $request->avatar,
            ]);
            if($request->hasFile('avatar')){
                $request->file('avatar')->move('picture/',$request->file('avatar')->getClientOriginalName());
                $user->avatar = $request->file('avatar')->getClientOriginalName();
                $user->save();
            }
        }else{
            $user->update([
                'kd_guru' => $request->kd_guru,
                'name' => $request->name,
                'email' => $request->username,
                'role' => $request->role,
                'mapel' => $request->mapel,
            ]);
        }
        return redirect('/detail_akun/'.$request->id)->with('status','Profil Berhasil Diubah!');
    }

    //Ubah Password
    public function changepass(Request $request,$id){
        $user = User::find($id);
        $user->update([
                'password' => Hash::make($request['newpassword'])
            ]);
        return redirect('/dashboard')->with('status','Password Berhasil Diubah!');
    }

    //Tambah Kelas
    public function tambah_kelas(Request $request){
        TabelAjar::create([
            'kd_guru' => $request['kd_guru'],
            'kd_rombel' => $request['kd_rombel'],
            'mapel' => $request['mapel'],
        ]);

        return redirect('/detail_akun/'.$request['id']);
    }
}