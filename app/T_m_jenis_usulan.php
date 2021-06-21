<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_jenis_usulan extends Model
{
    public $fillable = [
        'id_m_jenis_usulan',
        'nama_m_jenis_usulan'
    ];

    protected $primaryKey = 'id_m_jenis_usulan';
}
