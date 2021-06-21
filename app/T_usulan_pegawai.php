<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_usulan_pegawai extends Model
{
    public $fillable = [
        'id_usulan_pegawai',
        'id_usulan',
        'nip',
        'nama_golongan',
        'nama_pangkat',
        'status_berkas',
        'status_proses',
        'keterangan',
        'id_m_skpd',
        'lainnya',
        'id_m_layanan_kenaikan_pangkat',
        'id_m_pangkat_golongan'

    ];

    protected $primaryKey = 'id_usulan_pegawai';
}
