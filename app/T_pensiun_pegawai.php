<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_pensiun_pegawai extends Model
{
    public $fillable = [
        'id_pensiun',
        'jenis_pensiun',
        'tanggal_pensiun',
        'nip',
        'nama_pangkat',
        'nama_golongan',
        'nama_jabatan',
        'path_sk_pensiun',
        'nama_file_sk_pensiun'
    ];

    protected $primaryKey = 'id_pensiun';
}
