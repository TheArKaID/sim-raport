<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrudKelas extends Model
{
    protected $table = 'rombel';

    //
    protected $fillable = [
        'kd_rombel', 'rombel', 'jurusan', 'tingkat'
    ];
}
