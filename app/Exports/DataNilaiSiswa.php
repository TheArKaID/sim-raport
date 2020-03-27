<?php

namespace App\Exports;

use App\Siswa;
use App\Mapel;
use App\Semester1;
use App\Semester2;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataNilaiSiswa implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$data = Semester1::join('semester2s', 'semester2s.nis', 'semester1s.nis')
        ->join('siswas', 'siswas.nis', '=', 'semester1s.nis')
        ->join('mapels', 'mapels.kd_mapel', '=', 'semester1s.kd_mapel')
        ->select('siswas.nis', 'siswas.nama', 'siswas.jk', 'siswas.rayon', 'siswas.rombel', 'mapels.mapel', 'semester1s.uh_1p', 'semester1s.uh_1k', 'semester1s.uh_2p', 'semester1s.uh_2k', 'semester1s.uts_1p', 'semester1s.uts_1k', 'semester1s.uh_3p', 'semester1s.uh_3k', 'semester1s.uh_4p', 'semester1s.uh_4k', 'semester1s.uas_p', 'semester1s.uas_k', 'semester2s.uh_5p', 'semester2s.uh_5k', 'semester2s.uh_6p', 'semester2s.uh_6k', 'semester2s.uts_2p', 'semester2s.uts_2k', 'semester2s.uh_7p', 'semester2s.uh_7k', 'semester2s.uh_8p', 'semester2s.uh_8k', 'semester2s.ukk_p', 'semester2s.ukk_k')
        ->orderBy('siswas.nama', 'ASC')
        ->get();
        
        return $data;
    }
}
