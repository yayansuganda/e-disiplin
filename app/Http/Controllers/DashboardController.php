<?php

namespace App\Http\Controllers;

use App\T_pegawai;
use App\T_usulan_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');

        $model = T_pegawai::join('t_prajabatan_cpns_pns','t_prajabatan_cpns_pns.nip','=','t_pegawais.nip')
                ->join('t_m_status_kepegawaians','t_m_status_kepegawaians.id_m_status_kepegawaian','=','t_prajabatan_cpns_pns.id_m_status_kepegawaian')

                ->join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
                ->join('t_m_jenis_jabatans','t_m_jenis_jabatans.id_m_jenis_jabatan','=','t_jabatan_pegawais.id_m_jenis_jabatan')
                ->join('t_m_jabatans','t_m_jabatans.id_m_jabatan','=','t_jabatan_pegawais.id_m_jabatan')


                ->join('t_pendidikan_pegawais','t_pendidikan_pegawais.nip','=','t_pegawais.nip')
                ->join('t_m_tingkat_pendidikans','t_m_tingkat_pendidikans.id_m_tingkat_pendidikan','=','t_pendidikan_pegawais.id_m_tingkat_pendidikan')

                ->where('t_pegawais.nip', 195909111983031014)->firstOrFail();






        return view('dashboard.dashboard',compact('model','pegawai'));
    }
}
