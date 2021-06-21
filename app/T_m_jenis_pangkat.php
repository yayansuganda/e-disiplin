<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_jenis_pangkat extends Model
{
    public $fillable = [
        'id_m_jenis_pangkat',
        'id_m_golongan_',
        'nama_m_jenis_pangkat'
    ];

    protected $primaryKey = 'id_m_jenis_pangkat';
}
