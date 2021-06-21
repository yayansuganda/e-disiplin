<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_usulan_kenaikan_pangkat extends Model
{
    public $fillable = [
        'id_layanan_kenaikan_pangkat',
        'id_usulan',
        'nip',
        'nama_golongan_terakhir',
        'nama_pangkat_terakhir',
        'id_m_layanan_kenaikan_pangkat',
        'id_m_pangkat_golongan',
        'status_berkas',
        'status_proses',
        'keterangan',
        'id_m_skpd'

    ];

    protected $primaryKey = 'id_layanan_kenaikan_pangkat';

}
