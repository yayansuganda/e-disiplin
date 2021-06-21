<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_k_jenis_hukuman extends Model
{
    public $fillable = [
        'id_k_jenis_hd',
        'id_m_jenis_hd',
        'nama_k_jenis_hd'
    ];

    protected $primaryKey = 'id_k_jenis_hd';
}
