<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_ujian_pi extends Model
{
    public $fillable = [
        'id_ujian_pi',
        'nip',
        'jenis_ujian_pi',
        'tanggal_sertifikat_ujian_pi',
        'nomor_sertifikat_ujian_pi',
        'path_ujian_pi',
        'nama_file_ujian_pi'
    ];

    protected $primaryKey = 'id_ujian_pi';
}
