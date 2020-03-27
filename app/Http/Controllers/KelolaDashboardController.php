<?php

namespace App\Http\Controllers;

use App\User;
use App\Mapel;
use App\Siswa;
use App\Rayon;
use App\Rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaDashboardController extends Controller
{
    // View Dashboard
    public function dashboard(){
    	$guru = User::all();
    	$mapel = Mapel::all();
        $siswa = Siswa::all();
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $kelas_x = Siswa::join('rombels', 'rombels.rombel', '=', 'siswas.rombel')
        ->where('rombels.tingkat', 1)
        ->select('siswas.*', 'rombels.tingkat')
        ->count();
        $kelas_xi = Siswa::join('rombels', 'rombels.rombel', '=', 'siswas.rombel')
        ->where('rombels.tingkat', 2)
        ->select('siswas.*', 'rombels.tingkat')
        ->count();
        $kelas_xii = Siswa::join('rombels', 'rombels.rombel', '=', 'siswas.rombel')
        ->where('rombels.tingkat', 3)
        ->select('siswas.*', 'rombels.tingkat')
        ->count();

    	return view('dashboard', compact('siswa', 'guru', 'rombel', 'rayon', 'kelas_x', 'kelas_xi', 'kelas_xii', 'mapel'));
    }
}
