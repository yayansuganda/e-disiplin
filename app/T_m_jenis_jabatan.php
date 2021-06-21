<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_jenis_jabatan extends Model
{
    public $fillable = [
        'id_m_jenis_jabatan',
        'nama_m_jenis_jabatan'
    ];

    protected $primaryKey = 'id_m_jenis_jabatan';
}
