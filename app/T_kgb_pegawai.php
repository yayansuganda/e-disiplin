<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_kgb_pegawai extends Model
{
    public $fillable = [
        'id_kgb',
        'nip',
        'nama_golongan',
        'nama_pangkat',
        'tmt_kgb',
        'gaji_pokok',
        'nomor_sk_kgb',
        'tanggal_sk_kgb',
        'path_sk_kgb',
        'nama_file_sk_kgb'
    ];

    protected $primaryKey = 'id_kgb';
}
