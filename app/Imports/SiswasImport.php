<?php

namespace App\Imports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nis'     => $row[0],
            'nama'    => $row[1],
            'jk'    => $row[2],
            'rayon'    => $row[3],
            'rombel'    => $row[4],
        ]);
    }
}
