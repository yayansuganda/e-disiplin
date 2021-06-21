<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_jenis_mutasi extends Model
{
    public $fillable = [
        'id_m_jenis_mutasi',
        'nama_m_jenis_mutasi'
    ];

    protected $primaryKey = 'id_m_jenis_mutasi';
}
