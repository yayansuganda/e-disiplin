<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_tugas_belajar_pegawai extends Model
{
    public $fillable = [
        'id_tugas_belajar',
        'nip',
        'nama_sekolah_universitas',
        'nomor_sk_tugas_belajar',
        'tanggal_sk_tugas_belajar',
        'path_sk_tugas_belajar',
        'nama_file_sk_tugas_belajar'
    ];

    protected $primaryKey = 'id_tugas_belajar';
}
