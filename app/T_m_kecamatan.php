<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_kecamatan extends Model
{
    public $fillable = [
        'id_kecamatan',
        'id_kabupaten',
        'nama_kecamatan'

    ];

    protected $primaryKey = 'id_kecamatan';
}
