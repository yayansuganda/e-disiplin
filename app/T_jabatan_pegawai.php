<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_jabatan_pegawai extends Model
{
    public $fillable = [
        'id_jabatan',
        'nip',
        'id_m_jenis_jabatan',
        'nama_m_jabatan',
        'unit_unor',
        'nama_m_skpd',
        'tmt_jabatan',
        'tanggal_sk',
        'nomor_sk',
        'id_eselon',
        'tmt_pelantikan',
        'path_sk_jabatan',
        'nama_file_sk_jabatan',
        'path_sk_pelantikan_jabatan',
        'nama_file_sk_pelantikan_jabatan',
        'path_sumpah_jabatan',
        'nama_file_sumpah_jabatan'
    ];

    protected $primaryKey = 'id_jabatan';
}
