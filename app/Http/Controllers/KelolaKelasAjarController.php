<?php

namespace App\Http\Controllers;

use App\User;
use App\Rombel;
use App\Kelas_ajar;
use Illuminate\Http\Request;

class KelolaKelasAjarController extends Controller
{
	// View Kelas Ajar
	public function t_kelas_ajar($id){
		$user = User::select('users.*')
		->where('users.id', '=', $id)
		->first();
		$rombel = Rombel::all();
        $rombel_ajar = Rombel::join('kelas_ajars', 'rombels.kd_rombel', '=', 'kelas_ajars.kd_rombel')
        ->where('kelas_ajars.kd_guru', $user->kd_guru)
        ->select('rombels.*')
        ->orderBy('kd_rombel', 'asc')
        ->get();

		return view('kelola_akun.kelasAjar', compact('rombel', 'rombel_ajar'));
	}

    // Tambah Kelas Ajar
	public function simpan_kelas(Request $request){
		$kd_rombel = $request->kd_rombel;
		foreach ($kd_rombel as $kd) {
			$data = array(
			'kd_guru' => $request->kd_guru,
			'kd_rombel' => $kd,
			'kd_mapel' => $request->kd_mapel
			);
			Kelas_ajar::insert($data);
		}
		$user = User::select('users.*')
		->where('users.kd_guru', '=', $request->kd_guru)
		->first();
		$rombel = Rombel::all();
        $rombel_ajar = Rombel::join('kelas_ajars', 'rombels.kd_rombel', '=', 'kelas_ajars.kd_rombel')
        ->where('kelas_ajars.kd_guru', $request->kd_guru)
        ->select('rombels.*')
        ->orderBy('kd_rombel', 'asc')
        ->get();
    	$tingkat1 = Kelas_ajar::join('rombels', 'rombels.kd_rombel', '=', 'kelas_ajars.kd_rombel')
        ->select('kelas_ajars.*', 'rombels.rombel')
        ->where('kelas_ajars.kd_guru', $user->kd_guru)
        ->where('rombels.tingkat', 1)
        ->orderBy('kd_rombel', 'asc')
        ->get();
        $tingkat2 = Kelas_ajar::join('rombels', 'rombels.kd_rombel', '=', 'kelas_ajars.kd_rombel')
        ->select('kelas_ajars.*', 'rombels.rombel')
        ->where('kelas_ajars.kd_guru', $user->kd_guru)
        ->where('rombels.tingkat', 2)
        ->orderBy('kd_rombel', 'asc')
        ->get();
        $tingkat3 = Kelas_ajar::join('rombels', 'rombels.kd_rombel', '=', 'kelas_ajars.kd_rombel')
        ->select('kelas_ajars.*', 'rombels.rombel')
        ->where('kelas_ajars.kd_guru', $user->kd_guru)
        ->where('rombels.tingkat', 3)
        ->orderBy('kd_rombel', 'asc')
        ->get();

		return response()->json([
            'user' => $user, 
            'tingkat1' => $tingkat1, 
            'tingkat2' => $tingkat2, 
            'tingkat3' => $tingkat3, 
            'rombel' => $rombel, 
            'rombel_ajar' => $rombel_ajar
        ]);
	}

	//Menghapus Kelas Ajar
    public function hapus_kelas($id, $kd_guru){
        Kelas_ajar::where('id', '=', $id)
        ->delete();
    	$user = User::select('users.name')
    	->where('users.kd_guru', '=', $kd_guru)
    	->first();
    	$rombel = Rombel::all();
        $rombel_ajar = Rombel::join('kelas_ajars', 'rombels.kd_rombel', '=', 'kelas_ajars.kd_rombel')
        ->where('kelas_ajars.kd_guru', $kd_guru)
        ->select('rombels.*')
        ->orderBy('kd_rombel', 'asc')
        ->get();
    	$tingkat1 = Kelas_ajar::join('rombels', 'rombels.kd_rombel', '=', 'kelas_ajars.kd_rombel')
        ->select('kelas_ajars.*', 'rombels.rombel')
    	->where('kd_guru', $kd_guru)
    	->where('tingkat', 1)
    	->orderBy('kd_rombel', 'asc')
    	->get();
        $tingkat2 = Kelas_ajar::join('rombels', 'rombels.kd_rombel', '=', 'kelas_ajars.kd_rombel')
        ->select('kelas_ajars.*', 'rombels.rombel')
        ->where('kd_guru', $kd_guru)
        ->where('tingkat', 2)
        ->orderBy('kd_rombel', 'asc')
        ->get();
        $tingkat3 = Kelas_ajar::join('rombels', 'rombels.kd_rombel', '=', 'kelas_ajars.kd_rombel')
        ->select('kelas_ajars.*', 'rombels.rombel')
        ->where('kd_guru', $kd_guru)
        ->where('tingkat', 3)
        ->orderBy('kd_rombel', 'asc')
        ->get();
        
        return response()->json([
            'user' => $user, 
            'tingkat1' => $tingkat1, 
            'tingkat2' => $tingkat2, 
            'tingkat3' => $tingkat3, 
            'rombel' => $rombel, 
            'rombel_ajar' => $rombel_ajar
        ]);
    }
}
