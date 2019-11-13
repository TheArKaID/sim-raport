<?php

namespace App\Http\Controllers;

use App\TabelAjar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    //Menghapus Kelas Ajar
    public function hapus_kelas($id){
        DB::table('kelas_ajar')->where('id', '=', $id)->delete();
        return redirect('/kelola_akun');
    }
}
