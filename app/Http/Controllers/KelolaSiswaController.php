<?php

namespace App\Http\Controllers;

use Session;
use App\Rayon;
use App\Siswa;
use App\Rombel;
use Illuminate\Http\Request;
use App\Imports\SiswasImport;
use Maatwebsite\Excel\Facades\Excel;

class KelolaSiswaController extends Controller
{
    // View Kelola Siswa
    public function kelola_siswa()
    {
    	$siswas = Siswa::select('siswas.*')
        ->orderBy('nis', 'ASC')
        ->get();
    	$rayons = Rayon::select('rayons.*')
        ->orderBy('rayon', 'ASC')
        ->get();
    	$rombels = Rombel::select('rombels.*')
        ->orderBy('rombel', 'ASC')
        ->get();;

    	return view('kelola_data.kelola_siswa', compact('siswas', 'rayons', 'rombels'));
    }

    // Tambah Siswa
    public function tambah_siswa(Request $request)
    {
    	$siswas = new Siswa;
    	$siswas->nis = $request->nis;
    	$siswas->nama = $request->nama;
    	$siswas->jk = $request->jk;
    	$siswas->rombel = $request->rombel;
    	$siswas->rayon = $request->rayon;
    	$siswas->save();

    	Session::flash('save', 'Data siswa berhasil disimpan');

    	return redirect('/kelola_siswa');
    }

    // Edit Siswa
    public function edit_siswa($id)
    {
        $data_siswa = Siswa::where('siswas.id', $id)
        ->leftJoin('rayons', 'rayons.singkatan_rayon', '=', 'siswas.rayon')
        ->select('siswas.*', 'rayons.rayon as rayon_lengkap')
        ->first();

    	// $data_siswas = Siswa::find($id);
    	
        return response()->json(['data_siswa' => $data_siswa]);
    }

    // Update Siswa
    public function update_siswa(Request $request, $id)
    {
        $siswas = Siswa::find($id);
        $siswas->nis = $request->nis;
        $siswas->nama = $request->nama;
        $siswas->jk = $request->jk;
        $siswas->rombel = $request->rombel;
        $siswas->rayon = $request->rayon;
        $siswas->save();

        Session::flash('update', 'Data siswa berhasil diubah');

        echo "sukses";
    }

    // Hapus Siswa
    public function hapus_siswa($id)
    {
        Siswa::destroy($id);

        Session::flash('delete', 'Data siswa berhasil dihapus');

        echo "sukses";
    }

    // Import Siswa
    public function import_siswa()
    {
        Excel::import(new SiswasImport, request()->file('file'));

        Session::flash('import', 'Data siswa berhasil diimport');
        return back();
    }
}
