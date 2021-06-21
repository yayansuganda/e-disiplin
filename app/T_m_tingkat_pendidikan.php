<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_tingkat_pendidikan extends Model
{
    public $fillable = [
        'id_m_tingkat_pendidikan',
        'nama_m_tingkat_pendidikan'
    ];

    protected $primaryKey = 'id_m_tingkat_pendidikan';
}
