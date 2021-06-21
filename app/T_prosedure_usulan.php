<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_prosedure_usulan extends Model
{
    public $fillable = [
        'id_prosedure_usulan',
        'nama_prosedure_usulan',
        'id_m_jenis_usulan'
    ];

    protected $primaryKey = 'id_prosedure_usulan';
}
