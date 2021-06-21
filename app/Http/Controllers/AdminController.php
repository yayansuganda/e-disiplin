<?php

namespace App\Http\Controllers;

use App\T_golongan_pegawai;
use App\T_jabatan_pegawai;
use App\T_pegawai;
use App\T_pendidikan_pegawai;
use App\T_prajabatan_cpns_pns;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $chart_pangkat_golongan_terakhir = T_pegawai::select('t_m_pangkat_golongans.nama_pangkat','t_m_pangkat_golongans.nama_golongan',DB::raw('count(t_golongan_pegawais.id_m_pangkat_golongan) as total') )
                                                        ->leftjoin(DB::raw('(select nama_m_skpd, nip as nip from t_jabatan_pegawais group by nip)b'), function($join) {
                                                            $join->on('t_pegawais.nip','=','b.nip');})
                                                        ->join('t_golongan_pegawais','t_golongan_pegawais.nip','=','t_pegawais.nip')
                                                        ->join('t_m_pangkat_golongans','t_m_pangkat_golongans.id_m_pangkat_golongan','=','t_golongan_pegawais.id_m_pangkat_golongan')
                                                        ->join(DB::raw('(select max(id_m_pangkat_golongan) as id_m_pangkat_golongan from t_golongan_pegawais group by id_m_pangkat_golongan)c'), function($join) {
                                                            $join->on('t_golongan_pegawais.id_m_pangkat_golongan','=','c.id_m_pangkat_golongan');})

                                                        ->groupBy('t_golongan_pegawais.id_m_pangkat_golongan')
                                                        ->get();

            $chart_pendidikan = T_pegawai::select('t_m_tingkat_pendidikans.nama_m_tingkat_pendidikan',DB::raw('count(t_pendidikan_pegawais.id_m_tingkat_pendidikan) as total') )
                                            ->leftjoin(DB::raw('(select nama_m_skpd, nip as nip from t_jabatan_pegawais group by nip)b'), function($join) {
                                                $join->on('t_pegawais.nip','=','b.nip');})
                                            ->join('t_pendidikan_pegawais','t_pendidikan_pegawais.nip','=','t_pegawais.nip')
                                            ->join('t_m_tingkat_pendidikans','t_m_tingkat_pendidikans.id_m_tingkat_pendidikan','=','t_pendidikan_pegawais.id_m_tingkat_pendidikan')
                                            ->join(DB::raw('(select max(id_pendidikan_pegawai) as id_pendidikan_pegawai from t_pendidikan_pegawais group by id_pendidikan_pegawai)c'), function($join) {
                                                $join->on('t_pendidikan_pegawais.id_pendidikan_pegawai','=','c.id_pendidikan_pegawai');})

                                            ->groupBy('t_pendidikan_pegawais.id_m_tingkat_pendidikan')
                                            ->get();

            $chart_eselon = T_pegawai::select('t_m_eselons.nama_m_eselon',DB::raw('count(t_jabatan_pegawais.id_eselon) as total') )
                                            ->leftjoin(DB::raw('(select nama_m_skpd, nip as nip from t_jabatan_pegawais group by nip)b'), function($join) {
                                                $join->on('t_pegawais.nip','=','b.nip');})
                                            ->join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
                                            ->join('t_m_eselons','t_m_eselons.id_m_eselon','=','t_jabatan_pegawais.id_eselon')
                                            ->join(DB::raw('(select max(id_jabatan) as id_jabatan from t_jabatan_pegawais group by id_jabatan)c'), function($join) {
                                                $join->on('t_jabatan_pegawais.id_jabatan','=','c.id_jabatan');})

                                            ->groupBy('t_jabatan_pegawais.id_eselon')
                                            ->get();

            $chart_jenis_jabatan = T_pegawai::select('t_m_jenis_jabatans.nama_m_jenis_jabatan',DB::raw('count(t_jabatan_pegawais.id_m_jenis_jabatan) as total') )
                                            ->leftjoin(DB::raw('(select nama_m_skpd, nip as nip from t_jabatan_pegawais group by nip)b'), function($join) {
                                                $join->on('t_pegawais.nip','=','b.nip');})
                                            ->join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
                                            ->join('t_m_jenis_jabatans','t_m_jenis_jabatans.id_m_jenis_jabatan','=','t_jabatan_pegawais.id_m_jenis_jabatan')
                                            ->join(DB::raw('(select max(id_jabatan) as id_jabatan from t_jabatan_pegawais group by id_jabatan)c'), function($join) {
                                                $join->on('t_jabatan_pegawais.id_jabatan','=','c.id_jabatan');})

                                            ->groupBy('t_jabatan_pegawais.id_m_jenis_jabatan')
                                            ->get();


        $chart_skpd = DB::select("select t_jabatan_pegawais.nama_m_skpd, count(t_jabatan_pegawais.nama_m_skpd) as total from t_jabatan_pegawais
                                            INNER JOIN (SELECT MAX(id_jabatan)  AS id_jabatan FROM t_jabatan_pegawais  GROUP BY nip)b ON t_jabatan_pegawais.id_jabatan = b.id_jabatan
                                            group by t_jabatan_pegawais.nama_m_skpd order by t_jabatan_pegawais.nama_m_skpd
                                            ");

        $skpd = DB::table("t_m_skpds")->pluck('nama_m_skpd', 'nama_m_skpd');



        return view('dashboard.dashboard_admin',compact('skpd','chart_skpd','chart_pangkat_golongan_terakhir','chart_pendidikan','chart_eselon','chart_jenis_jabatan'));
    }



    public function show_data_chart($id)
    {

            $chart_pangkat_golongan_terakhir = T_pegawai::select('t_m_pangkat_golongans.nama_pangkat','t_m_pangkat_golongans.nama_golongan',DB::raw('count(t_golongan_pegawais.id_m_pangkat_golongan) as total') )
                                                        ->leftjoin(DB::raw('(select nama_m_skpd, nip as nip from t_jabatan_pegawais group by nip)b'), function($join) {
                                                            $join->on('t_pegawais.nip','=','b.nip');})
                                                        ->join('t_golongan_pegawais','t_golongan_pegawais.nip','=','t_pegawais.nip')
                                                        ->join('t_m_pangkat_golongans','t_m_pangkat_golongans.id_m_pangkat_golongan','=','t_golongan_pegawais.id_m_pangkat_golongan')
                                                        ->join(DB::raw('(select max(id_m_pangkat_golongan) as id_m_pangkat_golongan from t_golongan_pegawais group by id_m_pangkat_golongan)c'), function($join) {
                                                            $join->on('t_golongan_pegawais.id_m_pangkat_golongan','=','c.id_m_pangkat_golongan');})
                                                        ->where('b.nama_m_skpd','=',$id)
                                                        ->groupBy('t_golongan_pegawais.id_m_pangkat_golongan')
                                                        ->get();

            $chart_pendidikan = T_pegawai::select('t_m_tingkat_pendidikans.nama_m_tingkat_pendidikan',DB::raw('count(t_pendidikan_pegawais.id_m_tingkat_pendidikan) as total') )
                                            ->leftjoin(DB::raw('(select nama_m_skpd, nip as nip from t_jabatan_pegawais group by nip)b'), function($join) {
                                                $join->on('t_pegawais.nip','=','b.nip');})
                                            ->join('t_pendidikan_pegawais','t_pendidikan_pegawais.nip','=','t_pegawais.nip')
                                            ->join('t_m_tingkat_pendidikans','t_m_tingkat_pendidikans.id_m_tingkat_pendidikan','=','t_pendidikan_pegawais.id_m_tingkat_pendidikan')
                                            ->join(DB::raw('(select max(id_pendidikan_pegawai) as id_pendidikan_pegawai from t_pendidikan_pegawais group by id_pendidikan_pegawai)c'), function($join) {
                                                $join->on('t_pendidikan_pegawais.id_pendidikan_pegawai','=','c.id_pendidikan_pegawai');})
                                            ->where('b.nama_m_skpd','=',$id)
                                            ->groupBy('t_pendidikan_pegawais.id_m_tingkat_pendidikan')
                                            ->get();

            $chart_eselon = T_pegawai::select('t_m_eselons.nama_m_eselon',DB::raw('count(t_jabatan_pegawais.id_eselon) as total') )
                                            ->leftjoin(DB::raw('(select nama_m_skpd, nip as nip from t_jabatan_pegawais group by nip)b'), function($join) {
                                                $join->on('t_pegawais.nip','=','b.nip');})
                                            ->join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
                                            ->join('t_m_eselons','t_m_eselons.id_m_eselon','=','t_jabatan_pegawais.id_eselon')
                                            ->join(DB::raw('(select max(id_jabatan) as id_jabatan from t_jabatan_pegawais group by id_jabatan)c'), function($join) {
                                                $join->on('t_jabatan_pegawais.id_jabatan','=','c.id_jabatan');})
                                            ->where('b.nama_m_skpd','=',$id)
                                            ->groupBy('t_jabatan_pegawais.id_eselon')
                                            ->get();

            $chart_jenis_jabatan = T_pegawai::select('t_m_jenis_jabatans.nama_m_jenis_jabatan',DB::raw('count(t_jabatan_pegawais.id_m_jenis_jabatan) as total') )
                                            ->leftjoin(DB::raw('(select nama_m_skpd, nip as nip from t_jabatan_pegawais group by nip)b'), function($join) {
                                                $join->on('t_pegawais.nip','=','b.nip');})
                                            ->join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
                                            ->join('t_m_jenis_jabatans','t_m_jenis_jabatans.id_m_jenis_jabatan','=','t_jabatan_pegawais.id_m_jenis_jabatan')
                                            ->join(DB::raw('(select max(id_jabatan) as id_jabatan from t_jabatan_pegawais group by id_jabatan)c'), function($join) {
                                                $join->on('t_jabatan_pegawais.id_jabatan','=','c.id_jabatan');})
                                            ->where('b.nama_m_skpd','=',$id)
                                            ->groupBy('t_jabatan_pegawais.id_m_jenis_jabatan')
                                            ->get();

        return json_encode(array(
            "chart_pangkat_golongan_terakhir" => $chart_pangkat_golongan_terakhir,
            "chart_pendidikan" => $chart_pendidikan,
            "chart_eselon" => $chart_eselon,
            "chart_jenis_jabatan" => $chart_jenis_jabatan,
        ));
    }



}
