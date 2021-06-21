<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_keluarga_kandung_pegawai extends Model
{
    public $fillable = [
        'nip',
        'nama_keluarga',
        'id_m_hubungan_keluarga',
        'tempat_lahir',
        'tanggal_lahir',
        'status_hidup'
    ];

    protected $primaryKey = 'id_keluarga_kandung';
}
