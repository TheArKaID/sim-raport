<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $fillable = [
        'kd_rombel', 'rombel', 'jml_rombel', 'jurusan', 'singkat_jurusan', 'tingkat'
    ];
}
