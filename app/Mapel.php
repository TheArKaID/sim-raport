<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
	protected $table = 'mapel';

    //
    protected $fillable = [
        'kd_mapel', 'mapel'
    ];
}
