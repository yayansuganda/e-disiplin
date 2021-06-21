<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_jenis_pelanggaran_hd extends Model
{
    public $fillable = [
        'id_m_jenis_pelanggaran_hd',
        'nama_m_jenis_pelanggaran_hd',
        'kategori_pelanggaran_hd'
    ];

    protected $primaryKey = 'id_m_jenis_pelanggaran_hd';
}
