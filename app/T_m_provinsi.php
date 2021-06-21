<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_provinsi extends Model
{
    public $fillable = [
        'id_provinsi',
        'nama_provinsi'
    ];

    protected $primaryKey = 'id_provinsi';
}
