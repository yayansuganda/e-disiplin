<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_kewajiban extends Model
{
    public $fillable = [
        'id_m_kewajiban_hd',
        'nama_m_kewajiban_hd',
        'id_m_jenis_pelanggaran_hd'
    ];

    protected $primaryKey = 'id_m_kewajiban_hd';
}
