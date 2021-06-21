<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_jenis_hukuman extends Model
{
    public $fillable = [
        'id_m_jenis_hd',
        'nama_m_jenis_hd'
    ];

    protected $primaryKey = 'id_m_jenis_hd';
}
