<?php

namespace App\Http\Controllers;

use Session;
use App\Siswa;
use App\Nilai_kkm;
use App\Semester1;
use App\Semester2;
use App\Kelas_ajar;
use Illuminate\Http\Request;
use App\Exports\DataNilaiSiswa;
use Maatwebsite\Excel\Facades\Excel;

class KelolaTahunAjarController extends Controller
{
    // View Tahun Ajar
    public function tahun_ajar()
    {
    	return view('kelola_tahun_ajar.tahun_ajar');
    }

    // Ekspor Data
    public function eksport_data()
    {
    	$c_years = date('Y');
    	$d_years = $c_years + 1;
    	$tahun_a = 'Data_Nilai-Tahun_Ajar_' . $c_years . '-' . $d_years . '.xlsx';
    	
    	Siswa::truncate();
    	Nilai_kkm::truncate();
    	Semester1::truncate();
    	Semester2::truncate();
    	Kelas_ajar::truncate();

    	return Excel::download(new DataNilaiSiswa, $tahun_a);
    }
}