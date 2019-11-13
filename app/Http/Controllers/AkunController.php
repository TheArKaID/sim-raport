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

        return redirect('/kelola_akun');
    }

    //Menghapus Akun
    public function delete($id){
        DB::table('users')->where('kd_guru', '=', $id)->delete();
        DB::table('kelas_ajar')->where('kd_guru', '=', $id)->delete();
        return redirect('/kelola_akun');
    }

    //Lihat Akun
    public function detail($id, Request $request){
        $user = User::find($id);
        $mapel = Mapel::all();
        $kelas = CrudKelas::all();
        $t_ajar = TabelAjar::all();
        $tingkat1 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 1)->get();
        $tingkat2 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 2)->get();
        $tingkat3 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 3)->get();
        // $t_ajar = DB::table('rombel')->join('kelas_ajar', 'kelas_ajar.kd_rombel', '<>', 'rombel.kd_rombel')->select('rombel.kd_rombel', 'rombel.rombel')->groupBy('kd_rombel','rombel')->havingRaw('COUNT(*) > 2',[9])->get();
        return view('kelola_akun.detail_akun', compact('user', 'mapel', 'tingkat1', 'tingkat2', 'tingkat3', 'kelas', 't_ajar'));
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