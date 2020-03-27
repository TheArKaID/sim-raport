<?php

namespace App\Http\Controllers;

use Session;
use App\Rombel;
use Illuminate\Http\Request;

class KelolaRombelController extends Controller
{
    // View Kelola Rombel
    public function kelola_rombel()
    {
    	$htls = Rombel::select('rombels.*')
    	->where('singkatan_jurusan', '=', 'HTL')
    	->orderBy('rombel', 'ASC')
    	->get();
    	$rpls = Rombel::select('rombels.*')
    	->where('singkatan_jurusan', '=', 'RPL')
    	->orderBy('rombel', 'ASC')
    	->get();
    	$tkjs = Rombel::select('rombels.*')
    	->where('singkatan_jurusan', '=', 'TKJ')
    	->orderBy('rombel', 'ASC')
    	->get();
    	$bdps = Rombel::select('rombels.*')
    	->where('singkatan_jurusan', '=', 'BDP')
    	->orderBy('rombel', 'ASC')
    	->get();
    	$tbgs = Rombel::select('rombels.*')
    	->where('singkatan_jurusan', '=', 'TBG')
    	->orderBy('rombel', 'ASC')
    	->get();
    	$otkps = Rombel::select('rombels.*')
    	->where('singkatan_jurusan', '=', 'OTKP')
    	->orderBy('rombel', 'ASC')
    	->get();
    	$mmds = Rombel::select('rombels.*')
    	->where('singkatan_jurusan', '=', 'MMD')
    	->orderBy('rombel', 'ASC')
    	->get();
    	return view('kelola_data.kelola_rombel', compact('htls', 'rpls', 'tkjs', 'bdps', 'tbgs', 'otkps', 'mmds'));
    }

    // Tambah Rombel
    public function tambah_rombel($s_jur, $tingkat, $tingkat_r)
    {
    	$max = Rombel::max('kd_rombel');
        $max4 = $max[2].$max[3].$max[4];
        $max4++;
        if($max4 <= 9){
            $max4 = "RM00".$max4;
        }elseif ($max4 <= 99) {
            $max4 = "RM0".$max4;
        }elseif ($max4 <= 999) {
            $max4 = "RM".$max4;
        }

    	$check_1 = Rombel::select('rombels.jml_rombel')
    	->where('singkatan_jurusan', $s_jur)
    	->where('tingkat', $tingkat)
    	->where('jml_rombel', 1)
    	->first();
    	$check_2 = Rombel::select('rombels.jml_rombel')
    	->where('singkatan_jurusan', $s_jur)
    	->where('tingkat', $tingkat)
    	->where('jml_rombel', 2)
    	->first();
    	$check_3 = Rombel::select('rombels.jml_rombel')
    	->where('singkatan_jurusan', $s_jur)
    	->where('tingkat', $tingkat)
    	->where('jml_rombel', 3)
    	->first();
    	$check_4 = Rombel::select('rombels.jml_rombel')
    	->where('singkatan_jurusan', $s_jur)
    	->where('tingkat', $tingkat)
    	->where('jml_rombel', 4)
    	->first();
		$rombel = new Rombel;
		$rombel->kd_rombel = $max4;

		if($check_1 == null)
			$jml_rombel = 1;
		elseif($check_2 == null)
			$jml_rombel = 2;
		elseif($check_3 == null)
			$jml_rombel = 3;
		elseif($check_4 == null)
			$jml_rombel = 4;

    	$rombel->jml_rombel = $jml_rombel;
    	if($s_jur == 'RPL')
    	{
    		$rombel->rombel = "RPL " . $tingkat_r . '-' . $jml_rombel;
    		$rombel->jml_rombel = $jml_rombel;
    		$rombel->jurusan = "Rekayasa Perangkat Lunak";
    	}
    	elseif($s_jur == 'TKJ')
    	{
    		$rombel->rombel = "TKJ " . $tingkat_r . '-' . $jml_rombel;
    		$rombel->jurusan = "Teknik Komputer dan Jaringan";
    	}
    	elseif($s_jur == 'TBG')
    	{
    		$rombel->rombel = "TBG " . $tingkat_r . '-' . $jml_rombel;
    		$rombel->jurusan = "Tataboga";
    	}
    	elseif($s_jur == 'BDP')
    	{
    		$rombel->rombel = "BDP " . $tingkat_r . '-' . $jml_rombel;
    		$rombel->jurusan = "Bisnis Daring Pemasaran";
    	}
    	elseif($s_jur == 'MMD')
    	{
    		$rombel->rombel = "MMD " . $tingkat_r . '-' . $jml_rombel;
    		$rombel->jurusan = "Multimedia";
    	}
    	elseif($s_jur == 'HTL')
    	{
    		$rombel->rombel = "HTL " . $tingkat_r . '-' . $jml_rombel;
    		$rombel->jurusan = "Perhotelan";
    	}
    	elseif($s_jur == 'OTKP')
    	{
    		$rombel->rombel = "OTKP " . $tingkat_r . '-' . $jml_rombel;
    		$rombel->jurusan = "Otomatisasi dan Tata Kelola Perkantoran";
    	}
    	$rombel->singkatan_jurusan = $s_jur; 
    	$rombel->tingkat = $tingkat;
    	$rombel->save();

    	Session::flash('save', 'Rombel berhasil disimpan');

    	return redirect('/kelola_rombel');
    }

    // Hapus Rombel
    public function hapus_rombel($id)
    {
    	Rombel::destroy($id);
    	Session::flash('delete', 'Rombel berhasil dihapus');

    	return redirect('/kelola_rombel');
    }
}
