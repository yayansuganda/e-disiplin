<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_golongan extends Model
{
    public $fillable = [
        'id_m_golongan',
        'nama_m_golongan'

    ];

    protected $primaryKey = 'id_m_golongan';
}
