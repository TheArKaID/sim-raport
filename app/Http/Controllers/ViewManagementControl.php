<?php

namespace App\Http\Controllers;

use App\User;
use App\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewManagementControl extends Controller
{
    //View Dashboard
    public function dashboad(){
    	return view('dashboad');
    }

    public function dataTableAkun(){
        $user = User::all();
        return view('kelola_akun.dataTableAkun', compact('user'));
    }

    public function maksKode(){
        $max = User::max('kd_guru');
        $max4 = $max[1].$max[2].$max[3].$max[4];        
        $max4++;
        if($max4 <= 9){
            $max4 = "G000".$max4;
        }elseif ($max4 <= 99) {
            $max4 = "G00".$max4;
        }elseif ($max4 <= 999) {
            $max4 = "G0".$max4;
        }elseif ($max4 <= 99) {
            $max4 = "G".$max4;
        }
        return view('kelola_akun.maksKode', compact('max','max4'));
    }

    //View Kelola Akun
    public function kelola_akun(){
        $mapel = Mapel::all();
    	return view('kelola_akun.kelola_akun', compact('mapel'));
    }
}
