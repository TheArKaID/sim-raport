<?php

namespace App\Http\Controllers;

use App\Mapel;
use Illuminate\Http\Request;

class KelolaMapelController extends Controller
{
    // Simpan Mapel
    public function simpan_mapel(Request $request)
    {
    	$mapel = new Mapel;
    	$mapel->kd_mapel = $request->kd_mapel;
    	$mapel->mapel = $request->mapel;
    	$mapel->save();

    	echo "sukses";
    }

    // Hapus Mapel
    public function hapus_mapel($id)
    {
    	Mapel::where('kd_mapel', '=', $id)
        ->delete();

    	echo "sukses";
    }

    // Maksimal Kode Mapel
    public function maksKodeMapel()
    {
    	$max = Mapel::max('kd_mapel');
        $max4 = $max[1].$max[2].$max[3].$max[4];        
        $max4++;
        if($max4 <= 9){
            $max4 = "M000".$max4;
        }elseif ($max4 <= 99) {
            $max4 = "M00".$max4;
        }elseif ($max4 <= 999) {
            $max4 = "M0".$max4;
        }elseif ($max4 <= 99) {
            $max4 = "M".$max4;
        }

        return view('kelola_data.maksKodeMapel', compact('max4'));
    }

    // Tabel Mapel
    public function tabelMapel()
    {
    	$mapels = Mapel::all();

    	return view('kelola_data.tabelMapel', compact('mapels'));
    }

    // Select Mapel
    public function selectMapel()
    {
        $mapels = Mapel::all();

        return view('kelola_data.selectMapel', compact('mapels'));
    }
}
