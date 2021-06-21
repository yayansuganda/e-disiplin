<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_status_berkas extends Model
{
    protected $table = 't_m_status_berkas';

    public $fillable = [
        'id_m_status_berkas',
        'nama_m_status_berkas'
    ];

    protected $primaryKey = 'id_m_status_berkas';
}
