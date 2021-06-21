<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_golongan_pegawai extends Model
{
    public $fillable = [
        'id_golongan_pegawai',
        'nip',
        'id_m_pangkat_golongan',
        'nomor_sk',
        'tanggal_sk',
        'tmt_golongan',
        'nomor_bkn',
        'tanggal_bkn',
        'path_sk_kenaikan_pangkat',
        'nama_file_sk_kenaikan_pangkat'

    ];

    protected $primaryKey = 'id_golongan_pegawai';
}
