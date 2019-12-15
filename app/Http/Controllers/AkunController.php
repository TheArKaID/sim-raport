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

    //Lihat Akun
    public function detail($id){
        $user = User::find($id);
        $rombel = DB::table('rombel')->select('rombel.*')->get();
        $rombel_ajar = DB::table('rombel')->join('kelas_ajar', 'rombel.kd_rombel', '=', 'kelas_ajar.kd_rombel')->where('kelas_ajar.kd_guru', $user->kd_guru)->select('rombel.*')->orderBy('kd_rombel', 'asc')->get();
        $tingkat1 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 1)->orderBy('kd_rombel', 'asc')->get();
        $tingkat2 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 2)->orderBy('kd_rombel', 'asc')->get();
        $tingkat3 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 3)->orderBy('kd_rombel', 'asc')->get();
        return response()->json(['user' => $user, 'tingkat1' => $tingkat1, 'tingkat2' => $tingkat2, 'tingkat3' => $tingkat3, 'rombel' => $rombel, 'rombel_ajar' => $rombel_ajar]);
    }

    //Update Akun
    public function update(Request $request,$id,$kd_guru){
        DB::table('kelas_ajar')->where('kd_guru', '=', $kd_guru)->update(['mapel' => $request->mapelupdate]);
        $user = User::find($id);
        $image = $request->avatarupdate;
        if($image != ''){
            $user->update([
                'name' => $request->nameupdate,
                'email' => $request->usernameupdate,
                'role' => $request->roleupdate,
                'mapel' => $request->mapelupdate,
                'avatar' => $request->avatarupdate,
            ]);
            if($request->hasFile('avatarupdate')){
                $request->file('avatarupdate')->move('picture/',$request->file('avatarupdate')->getClientOriginalName());
                $user->avatar = $request->file('avatarupdate')->getClientOriginalName();
                $user->save();
            }
        }else{
            $user->update([
                'name' => $request->nameupdate,
                'email' => $request->usernameupdate,
                'role' => $request->roleupdate,
                'mapel' => $request->mapelupdate,
            ]);
        }
        return response()->json($user);
        echo "sukses";
    }

    //Ubah Password
    public function changepass(Request $request,$id){
        $user = User::find($id);
        $user->update([
                'password' => Hash::make($request['newpassword'])
            ]);
        return redirect('/dashboard')->with('status','Password Berhasil Diubah!');
    }
}