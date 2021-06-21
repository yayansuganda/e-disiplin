<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_panggilan_pegawai extends Model
{
    public $fillable = [
        'id_panggilan',
        'nomor_surat',
        'surat_panggilan',
        'nip_periksa',
        'pangkat_periksa',
        'jabatan_periksa',
        'unit_kerja_periksa',
        'nip_pemeriksa',
        'pangkat_pemeriksa',
        'jabatan_pemeriksa',
        'hari',
        'tanggal',
        'jam',
        'tempat'
    ];

    protected $primaryKey = 'id_panggilan';
}
