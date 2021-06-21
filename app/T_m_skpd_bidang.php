<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_skpd_bidang extends Model
{
    public $fillable = [
        'id_m_skpd_bidang',
        'id_m_skpd',
        'nama_m_skpd_bidang'
    ];

    protected $primaryKey = 'id_m_skpd_bidang';



    public function skpd(){
    	return $this->belongsTo(T_m_skpd::class);
    }

    public function subbidang(){
        return $this->hasMany(T_m_skpd_subbidang::class, 'id_m_skpd_bidang');
    }

}
