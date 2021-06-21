<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_eselon extends Model
{
    public $fillable = [
        'id_m_eselon',
        'nama_m_eselon'
    ];

    protected $primaryKey = 'id_m_eselon';
}
