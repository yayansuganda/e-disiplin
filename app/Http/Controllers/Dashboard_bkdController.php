<?php

namespace App\Http\Controllers;

use App\T_usulan_kenaikan_pangkat;
use App\T_usulan_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard_bkdController extends Controller
{

    public function index()
    {
        $kp = T_usulan_pegawai::where('status_berkas','=','Usulan')->get();

        $chartpendidikan = DB::select(" select t_m_tingkat_pendidikans.nama_m_tingkat_pendidikan, t_pendidikan_pegawais.nama_sekolah, count(t_pendidikan_pegawais.id_m_tingkat_pendidikan) as total
                                                    from t_pendidikan_pegawais
                                                    INNER JOIN t_m_tingkat_pendidikans on t_m_tingkat_pendidikans.id_m_tingkat_pendidikan = t_pendidikan_pegawais.id_m_tingkat_pendidikan
                                                    where t_pendidikan_pegawais.id_pendidikan_pegawai in (select MAX(t_pendidikan_pegawais.id_pendidikan_pegawai) from t_pendidikan_pegawais group by t_pendidikan_pegawais.nip )
                                                    group by t_pendidikan_pegawais.id_m_tingkat_pendidikan
                                    ");

        return view('dashboard.dashboard_bkd', compact('kp','chartpendidikan'));
    }
}
