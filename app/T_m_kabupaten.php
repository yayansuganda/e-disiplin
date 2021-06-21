<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_kabupaten extends Model
{
    public $fillable = [
        'id_kabupaten',
        'id_provinsi',
        'nama_provinsi'

    ];

    protected $primaryKey = 'id_kabupaten';
}
