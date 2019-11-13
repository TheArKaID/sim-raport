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
    public function detail_nilai($kd_rombel){
    	$daftar_siswa = DB::table('siswa')->join('rombel', 'rombel.rombel', '=', 'siswa.rombel')->select('siswa.*', 'rombel.kd_rombel')->where('rombel.kd_rombel', '=', $kd_rombel)->orderBy('nama')->get();
    	return view('kelola_nilai.detail_nilai', compact('daftar_siswa'));
    }
}