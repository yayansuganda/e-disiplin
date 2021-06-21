<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_usulan_kgb extends Model
{
    public $fillable = [
        'id_usulan_kgb',
        'id_usulan',
        'nip',
        'nama_golongan',
        'nama_pangkat',
        'status_berkas',
        'status_proses',
        'keterangan',
        'id_m_skpd'

    ];

    protected $primaryKey = 'id_usulan_kgb';
}
