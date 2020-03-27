<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas_ajar extends Model
{
    protected $fillable = [
        'guru', 'kd_mapel', 'kd_rombel', 'jurusan', 'tingkat'
    ];
}
