<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_m_skpd_subbidang extends Model
{
    public $fillable = [
        'id_m_skpd_subbidang',
        'id_m_skpd_bidang',
        'nama_m_skpd_subbidang'
    ];

    protected $primaryKey = 'id_m_skpd_subbidang';


    public function subbidang(){
    	return $this->belongsTo(T_m_skpd_subbidang::class, 'id_m_skpd_bidang');
    }

    public function bidang(){
    	return $this->belongsTo(T_m_skpd_bidang::class);
    }
}
