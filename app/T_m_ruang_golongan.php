<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_ruang_golongan extends Model
{
    public $fillable = [
        'id_m_ruang_golongan',
        'id_m_golongan_',
        'nama_m_ruang_golongan'
    ];

    protected $primaryKey = 'id_m_ruang_golongan';
}
