<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_cuti_pegawai extends Model
{
    public $fillable = [
        'id_cuti',
        'nip',
        'jenis_cuti',
        'nomor_sk_cuti',
        'tanggal_sk_cuti',
        'tanggal_mulai_cuti',
        'tanggal_selesai_cuti',
        'path_sk_cuti',
        'nama_file_sk_cuti'
    ];

    protected $primaryKey = 'id_cuti';
}
