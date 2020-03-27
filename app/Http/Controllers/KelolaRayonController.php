<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Rayon;
use Illuminate\Http\Request;

class KelolaRayonController extends Controller
{
    // View Kelola Rayon
    public function kelola_rayon()
    {
    	$users = User::all();
    	$ciss = Rayon::join('users', 'rayons.kd_guru', '=', 'users.kd_guru')
    	->where('daerah', 'Cisarua')
    	->select('rayons.*', 'users.name')
    	->orderBy('rayon', 'ASC')
    	->get();
    	$cics = Rayon::join('users', 'rayons.kd_guru', '=', 'users.kd_guru')
    	->where('daerah', 'Cicurug')
    	->select('rayons.*', 'users.name')
    	->orderBy('rayon', 'ASC')
    	->get();
    	$cibs = Rayon::join('users', 'rayons.kd_guru', '=', 'users.kd_guru')
    	->where('daerah', 'Cibedug')
    	->select('rayons.*', 'users.name')
    	->orderBy('rayon', 'ASC')
    	->get();
    	$cias = Rayon::join('users', 'rayons.kd_guru', '=', 'users.kd_guru')
    	->where('daerah', 'Ciawi')
    	->select('rayons.*', 'users.name')
    	->orderBy('rayon', 'ASC')
    	->get();
    	$tajs = Rayon::join('users', 'rayons.kd_guru', '=', 'users.kd_guru')
    	->where('daerah', 'Tajur')
    	->select('rayons.*', 'users.name')
    	->orderBy('rayon', 'ASC')
    	->get();
    	$suks = Rayon::join('users', 'rayons.kd_guru', '=', 'users.kd_guru')
    	->where('daerah', 'Sukasari')
    	->select('rayons.*', 'users.name')
    	->orderBy('rayon', 'ASC')
    	->get();
    	$wiks = Rayon::join('users', 'rayons.kd_guru', '=', 'users.kd_guru')
    	->where('daerah', 'Wikrama')
    	->select('rayons.*', 'users.name')
    	->orderBy('rayon', 'ASC')
    	->get();

    	return view('kelola_data.kelola_rayon', compact('ciss', 'cias', 'cibs', 'cics', 'tajs', 'suks', 'wiks', 'users'));
    }

    // Tambah Rayon
    public function tambah_rayon(Request $request, $ray, $daerah)
    {
    	$max = Rayon::max('kd_rayon');
        $max4 = $max[2].$max[3].$max[4];        
        $max4++;
        if($max4 <= 9){
            $max4 = "RY00".$max4;
        }elseif ($max4 <= 99) {
            $max4 = "RY0".$max4;
        }elseif ($max4 <= 999) {
            $max4 = "RY".$max4;
        }

        $check_1 = Rayon::select('rayons.jml_rayon')
    	->where('daerah', $daerah)
    	->where('jml_rayon', 1)
    	->first();
    	$check_2 = Rayon::select('rayons.jml_rayon')
    	->where('daerah', $daerah)
    	->where('jml_rayon', 2)
    	->first();
    	$check_3 = Rayon::select('rayons.jml_rayon')
    	->where('daerah', $daerah)
    	->where('jml_rayon', 3)
    	->first();
    	$check_4 = Rayon::select('rayons.jml_rayon')
    	->where('daerah', $daerah)
    	->where('jml_rayon', 4)
    	->first();
    	$check_5 = Rayon::select('rayons.jml_rayon')
    	->where('daerah', $daerah)
    	->where('jml_rayon', 5)
    	->first();
    	$check_6 = Rayon::select('rayons.jml_rayon')
    	->where('daerah', $daerah)
    	->where('jml_rayon', 6)
    	->first();
    	$check_7 = Rayon::select('rayons.jml_rayon')
    	->where('daerah', $daerah)
    	->where('jml_rayon', 7)
    	->first();

    	if($check_1 == null)
			$jml_rayon = 1;
		elseif($check_2 == null)
			$jml_rayon = 2;
		elseif($check_3 == null)
			$jml_rayon = 3;
		elseif($check_4 == null)
			$jml_rayon = 4;
		elseif($check_5 == null)
			$jml_rayon = 5;
		elseif($check_6 == null)
			$jml_rayon = 6;
		elseif($check_7 == null)
			$jml_rayon = 7;

        if($ray == "Cia")
        	$nama_rayon = "Ciawi ". $jml_rayon;
        elseif($ray == "Cis")
        	$nama_rayon = "Cisarua ". $jml_rayon;
        elseif($ray == "Cic")
        	$nama_rayon = "Cicurug ". $jml_rayon;
        elseif($ray == "Cib")
        	$nama_rayon = "Cibedug ". $jml_rayon;
        elseif($ray == "Wik")
        	$nama_rayon = "Wikrama ". $jml_rayon;
        elseif($ray == "Taj")
        	$nama_rayon = "Tajur ". $jml_rayon;
        elseif($ray == "Suk")
        	$nama_rayon = "Sukasari ". $jml_rayon;

    	$rayons = new Rayon;
    	$rayons->kd_rayon = $max4;
    	$rayons->rayon = $nama_rayon;
    	$rayons->singkatan_rayon = $ray . " " . $jml_rayon;
        $rayons->daerah = $daerah;
    	$rayons->jml_rayon = $jml_rayon;
    	$rayons->kd_guru = $request->kd_guru;
    	$rayons->save();

    	Session::flash('save', 'Rayon berhasil disimpan');

    	return redirect('/kelola_rayon');
    }

    // Hapus Rayon
    public function hapus_rayon($id)
    {
    	Rayon::destroy($id);

    	Session::flash('delete', 'Rayon berhasil dihapus');

    	return redirect('/kelola_rayon');
    }
}
