<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester1 extends Model
{
    protected $fillable = [
        'kd_rombel', 'kd_mapel', 'nis', 'uh_1p', 'uh_1k', 'uh_2p', 'uh_2k', 'uts_1p', 'uts_1k', 'uh_3p', 'uh_3k', 'uh_4p', 'uh_4k', 'uas_p', 'uas_k'
    ];
}
