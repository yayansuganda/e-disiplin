<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_jenis_kp extends Model
{
    public $fillable = [
        'id_m_jenis_kp',
        'nama_m_jenis_kp'
    ];

    protected $primaryKey = 'id_m_jenis_kp';
}
