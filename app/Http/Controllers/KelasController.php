<?php

namespace App\Http\Controllers;

use App\User;
use App\TabelAjar;
use App\KelasAjar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
	//Tambah Kelas
	public function tambah_kelas(Request $request){
		$kd_rombel = $request->kd_rombel;
		foreach ($kd_rombel as $kd) {
			$data = array(
			'id' => null,
			'kd_guru' => $request->kd_guru,
			'kd_rombel' => $kd,
			'mapel' => $request->mapel
			);
			DB::table('kelas_ajar')->insert($data);
		}
		$user = DB::table('users')->select('users.*')->where('users.kd_guru', '=', $request->kd_guru)->first();
		$rombel = DB::table('rombel')->select('rombel.*')->get();
        $rombel_ajar = DB::table('rombel')->join('kelas_ajar', 'rombel.kd_rombel', '=', 'kelas_ajar.kd_rombel')->where('kelas_ajar.kd_guru', $request->kd_guru)->select('rombel.*')->orderBy('kd_rombel', 'asc')->get();
    	$tingkat1 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 1)->orderBy('kd_rombel', 'asc')->get();
        $tingkat2 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 2)->orderBy('kd_rombel', 'asc')->get();
        $tingkat3 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 3)->orderBy('kd_rombel', 'asc')->get();
		return response()->json(['user' => $user, 'tingkat1' => $tingkat1, 'tingkat2' => $tingkat2, 'tingkat3' => $tingkat3, 'rombel' => $rombel, 'rombel_ajar' => $rombel_ajar]);
	}

	//Sample Query
	public function t_kelas_ajar($id){
		$user = DB::table('users')->select('users.*')->where('users.id', '=', $id)->first();
		$rombel = DB::table('rombel')->select('rombel.*')->get();
        $rombel_ajar = DB::table('rombel')->join('kelas_ajar', 'rombel.kd_rombel', '=', 'kelas_ajar.kd_rombel')->where('kelas_ajar.kd_guru', $user->kd_guru)->select('rombel.*')->orderBy('kd_rombel', 'asc')->get();
		return view('kelola_akun.kelasAjar', compact('rombel', 'rombel_ajar'));
	}

    //Menghapus Kelas Ajar
    public function hapus_kelas($id, $kd_guru){
        DB::table('kelas_ajar')->where('id', '=', $id)->delete();
    	$user = DB::table('users')->select('users.*')->where('users.kd_guru', '=', $kd_guru)->first();
    	$rombel = DB::table('rombel')->select('rombel.*')->get();
        $rombel_ajar = DB::table('rombel')->join('kelas_ajar', 'rombel.kd_rombel', '=', 'kelas_ajar.kd_rombel')->where('kelas_ajar.kd_guru', $kd_guru)->select('rombel.*')->orderBy('kd_rombel', 'asc')->get();
    	$tingkat1 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 1)->orderBy('kd_rombel', 'asc')->get();
        $tingkat2 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 2)->orderBy('kd_rombel', 'asc')->get();
        $tingkat3 = KelasAjar::select('id', 'rombel', 'kd_rombel')->where('name', $user->name)->where('tingkat', 3)->orderBy('kd_rombel', 'asc')->get();
        return response()->json(['user' => $user, 'tingkat1' => $tingkat1, 'tingkat2' => $tingkat2, 'tingkat3' => $tingkat3, 'rombel' => $rombel, 'rombel_ajar' => $rombel_ajar]);
    }
}