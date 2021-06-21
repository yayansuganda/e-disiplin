<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_k_jenis_hukuman extends Model
{
    protected $table = "t_k_jenis_hukumen";
    public $fillable = [
        'id_k_jenis_hd',
        'id_m_jenis_hd',
        'nama_k_jenis_hd'
    ];

    protected $primaryKey = 'id_k_jenis_hd';
}
