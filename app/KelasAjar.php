<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasAjar extends Model
{
    protected $table = 'q_kelas_ajar';

    //
    protected $fillable = [
        'id', 'name', 'mapel', 'rombel', 'jurusan', 'tingkat'
    ];
}
