<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_jenis_cuti extends Model
{
    public $fillable = [
        'id_m_jenis_cuti',
        'nama_m_jenis_cuti'
    ];

    protected $primaryKey = 'id_m_jenis_cuti';
}
