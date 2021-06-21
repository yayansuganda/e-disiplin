<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_pendidikan_pegawai extends Model
{
    public $fillable = [
        'id_pendidikan_pegawai',
        'nip',
        'id_m_tingkat_pendidikan',
        'tanggal_ijazah',
        'nomor_ijazah',
        'nama_sekolah',
        'path_ijazah',
        'nama_file_ijazah'

    ];

    protected $primaryKey = 'id_pendidikan_pegawai';
}
