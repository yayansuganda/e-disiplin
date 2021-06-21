<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_hukuman_pegawai extends Model
{
    public $fillable = [
        'id_hukuman_hd',
        'nip',
        'id_m_jenis_hd',
        'id_k_jenis_hd',
        'id_m_jenis_pelanggaran_hd',
        'kategori_pelanggaran',
        'nomor_sk_hd',
        'tanggal_sk_hd',
        'tmt_hd',
        'masa_hd',
        'tanggal_akhir_hd',
        'nama_pangkat',
        'nama_golongan',
        'nomor_pp',
        'keterangan',


    ];

    protected $primaryKey = 'id_hukuman_hd';
}
