<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    //Menampilkan Kelas Ajar
    public function dashboard_nilai($kd_guru){
    	$daftar_kelas = DB::table('rombel')->join('kelas_ajar', 'kelas_ajar.kd_rombel', '=', 'rombel.kd_rombel')->select('kelas_ajar.kd_rombel', 'rombel.rombel')->where('kelas_ajar.kd_guru', '=', $kd_guru)->orderBy('rombel')->get();
    	return view('kelola_nilai.dashboard_nilai', compact('daftar_kelas'));
    }

    //Menampilkan Data Siswa Berdasarkan Rombel
    public function detail_nilai($kd_rombel, $mapel){
    	$daftar_siswa = DB::table('siswa')->join('rombel', 'rombel.rombel', '=', 'siswa.rombel')->select('siswa.*', 'rombel.kd_rombel')->where('rombel.kd_rombel', '=', $kd_rombel)->orderBy('nama')->get();
        $tampil_kkm = DB::table('kkm')->select('kkm.kkm')->where('kd_rombel', '=', $kd_rombel)->where('mapel', '=', $mapel)->get();
        $cek_kkm = DB::table('kkm')->where('kd_rombel', '=', $kd_rombel)->where('mapel', '=', $mapel)->count();
    	return view('kelola_nilai.detail_nilai', ['kd_rombel' => $kd_rombel], compact('daftar_siswa', 'tampil_kkm', 'cek_kkm'));
    }

    //Kelola Nilai Mapel Siswa
    public function kelola_nilai($nis, $kd_rombel, $mapel, $kkm){
        $daftar_nilai = DB::table('nilai')->select('nilai.*')->where('nilai.nis', '=', $nis)->where('mapel', '=', $mapel)->get();
        $cek_isi = DB::table('nilai')->where('nis', '=', $nis)->count();
        $identitas = DB::table('siswa')->select('siswa.*')->where('siswa.nis', '=', $nis)->get();
        return view('kelola_nilai.kelola_nilai_siswa', compact('daftar_nilai', 'cek_isi', 'kd_rombel', 'mapel', 'nis', 'identitas', 'kkm'));
    }

    //Input KKM Mapel
    public function input_kkm(Request $req, $kd_guru, $kd_rombel, $mapel)
    {
        DB::table('kkm')->insert([
            'kd_guru' => $kd_guru,
            'mapel' => $mapel,
            'kd_rombel' => $kd_rombel,
            'kkm' => $req->kkm
        ]);
        return redirect('/detail_nilai/'.$kd_rombel.'/'.$mapel);
    }

    //Update KKM Mapel
    public function update_kkm(Request $req, $kd_guru, $kd_rombel, $mapel)
    {
        DB::table('kkm')->where('kd_rombel', '=', $kd_rombel)->where('mapel', '=', $mapel)->where('kd_guru', '=', $kd_guru)->update(['kkm' => $req->kkm]);
        return redirect('/detail_nilai/'.$kd_rombel.'/'.$mapel);
    }

    //Input Nilai Siswa
    public function input_nilai(Request $req, $nis, $kd_rombel, $mapel, $kkm)
    {
        DB::table('nilai')->insert([
            'nis' => $nis,
            'mapel' => $mapel,
            'uh1' => $req->uh1,
            'uh2' => $req->uh2,
            'uts1' => $req->uts1,
            'uh3' => $req->uh3,
            'uh4' => $req->uh4,
            'uas' => $req->uas,
            'uh5' => $req->uh5,
            'uh6' => $req->uh6,
            'uts2' => $req->uts2,
            'uh7' => $req->uh7,
            'uh8' => $req->uh8,
            'ukk' => $req->ukk
        ]);
        return redirect('/kelola_nilai_siswa/'.$nis.'/'.$kd_rombel.'/'.$mapel.'/'.$kkm);
    }

    //Update Nilai Siswa
    public function update_nilai(Request $req, $nis, $kd_rombel, $mapel, $kkm)
    {
        DB::table('nilai')->where('nis', '=', $nis)->update([
            'uh1' => $req->uh1,
            'uh2' => $req->uh2,
            'uts1' => $req->uts1,
            'uh3' => $req->uh3,
            'uh4' => $req->uh4,
            'uas' => $req->uas,
            'uh5' => $req->uh5,
            'uh6' => $req->uh6,
            'uts2' => $req->uts2,
            'uh7' => $req->uh7,
            'uh8' => $req->uh8,
            'ukk' => $req->ukk
        ]);
        return redirect('/kelola_nilai_siswa/'.$nis.'/'.$kd_rombel.'/'.$mapel.'/'.$kkm);
    }
}