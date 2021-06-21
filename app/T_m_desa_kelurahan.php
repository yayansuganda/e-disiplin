<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_desa_kelurahan extends Model
{
    public $fillable = [
        'id_desa_kelurahan',
        'id_kecamatan',
        'nama_desa_kelurahan'

    ];

    protected $primaryKey = 'id_desa_kelurahan';
}
