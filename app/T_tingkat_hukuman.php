<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_tingkat_hukuman extends Model
{
    public $fillable = [
        'id_tingkat_hd',
        'id_m_jenis_hd',
        'id_m_kewajiban_hd',
        'nama_tingkat_hd',
        'keterangan'

    ];

    protected $primaryKey = 'id_tingkat_hd';
}
