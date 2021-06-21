<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_skpd extends Model
{
    public $fillable = [
        'id_m_skpd',
        'nama_m_skpd'
    ];

    protected $primaryKey = 'id_m_skpd';

    public function bidang(){
        return $this->hasMany(T_m_skpd_bidang::class, 'id_m_skpd');
    }
}
