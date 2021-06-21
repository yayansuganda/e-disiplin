<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_status_proses extends Model
{
    protected $table = 't_m_status_proses';

    public $fillable = [
        'id_m_status_proses',
        'nama_m_status_proses'
    ];

    protected $primaryKey = 'id_m_status_proses';
}
