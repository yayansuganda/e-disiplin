<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_pangkat_golongan extends Model
{
    public $fillable = [
        'id_m_pangkat_golongan',
        'nama_pangkat',
        'nama_golongan'

    ];

    protected $primaryKey = 'id_m_pangkat_golongan';
}
