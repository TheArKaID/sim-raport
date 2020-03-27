<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $fillable = [
        'kd_rayon', 'rayon', 'singkatan_rayon', 'daerah', 'jml_rayon', 'kd_guru'
    ];
}
