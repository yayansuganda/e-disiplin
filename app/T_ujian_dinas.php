<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_ujian_dinas extends Model
{
    public $fillable = [
        'id_ujian_dinas',
        'nip',
        'jenis_ujian_dinas',
        'nomor_sertifikat_ujian_dinas',
        'tanggal_sertifikat_ujian_dinas',
        'path_ujian_dinas',
        'nama_file_ujian_dinas'
    ];

    protected $primaryKey = 'id_ujian_dinas';
}
