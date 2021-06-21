<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_penghargaan_pegawai extends Model
{
    public $fillable = [
        'id_penghargaan',
        'nip',
        'nama_penghargaan',
        'tanggal_perolehan',
        'nomor',
        'negara_instansi_pemberi',
        'path_penghargaan',
        'nama_file_penghargaan'
    ];

    protected $primaryKey = 'id_penghargaan';
}
