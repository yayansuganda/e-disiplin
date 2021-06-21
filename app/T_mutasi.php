<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_mutasi extends Model
{
    public $fillable = [
        'id_mutasi',
        'nip',
        'jenis_mutasi',
        'instansi_unit_kerja_baru',
        'nomor_sk_mutasi',
        'tanggal_sk_mutasi',
        'path_sk_mutasi',
        'nama_file_sk_mutasi'
    ];

    protected $primaryKey = 'id_mutasi';
}
