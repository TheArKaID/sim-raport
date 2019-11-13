<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabelAjar extends Model
{
    protected $table = 'kelas_ajar';

    //
    protected $fillable = [
         'id', 'kd_guru', 'kd_rombel', 'mapel'
    ];
}