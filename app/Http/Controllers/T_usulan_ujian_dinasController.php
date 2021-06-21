<?php

namespace App\Http\Controllers;

use App\T_golongan_pegawai;
use App\T_jabatan_pegawai;
use App\T_nomor_usul;
use App\T_pegawai;
use App\T_prajabatan_cpns_pns;
use App\T_ujian_dinas;
use App\T_usulan_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class T_usulan_ujian_dinasController extends Controller
{
    public function data_usulan_ujian_dinas($id)
    {
        $model =  T_usulan_pegawai::select('*')
            ->join('t_usulans', 't_usulans.id_usulan', '=', 't_usulan_pegawais.id_usulan')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_usulan_pegawais.nip')
            ->where('t_usulans.nomor_usulan','=',$id)
            ->where('t_usulan_pegawais.status_berkas','=','Usulan')
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Daftar Usulan Ujian Dinas",
                    'url_edit' => route('usulan_ujian_dinas.edit', $model->id_usulan_pegawai),
                    'url_destroy' => route('usulan_ujian_dinas.destroy', $model->id_usulan_pegawai)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }


    public function show($id)
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->get();


        $model = new T_nomor_usul();
        $model2 = T_nomor_usul::where('nomor_usulan', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_ujian_dinas.form', compact('model', 'pegawai','model2'));
    }


    public function store(Request $request)
    {
        $model = T_usulan_pegawai::create($request->all());
        return $model;
    }

    public function edit($id)
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->get();

        $model = T_usulan_pegawai::join('t_usulans','t_usulans.id_usulan','=','t_usulan_pegawais.id_usulan')
                ->where('id_usulan_pegawai', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_ujian_dinas.form', compact('model', 'pegawai'));
    }


    public function update(Request $request, $id)
    {
        $model = T_usulan_pegawai::where('id_usulan_pegawai', $id)->firstOrFail();

        $model->update($request->all());
    }


    public function destroy($id)
    {
        T_usulan_pegawai::destroy($id);
    }


    //UNTUK DAFTAR USULAN YANG TAMPIL DI BIDANG
    public function index_daftar_usulan_ujian_dinas()
    {
        $nama_skpd = T_usulan_pegawai::join('t_m_skpds','t_m_skpds.id_m_skpd','=','t_usulan_pegawais.id_m_skpd')
        ->groupBy('t_usulan_pegawais.id_m_skpd')
        ->pluck('t_m_skpds.nama_m_skpd', 't_m_skpds.id_m_skpd');

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_ujian_dinas.daftar_usulan_ujian_dinas', compact('nama_skpd'));
    }


    public function daftar_usulan_ujian_dinas($id)
    {
        if ($id == 0) {
            $model =  T_usulan_pegawai::select('*')
            ->join('t_usulans', 't_usulans.id_usulan', '=', 't_usulan_pegawais.id_usulan')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_usulan_pegawais.nip')
            ->join('t_m_skpds', 't_m_skpds.id_m_skpd', '=', 't_usulan_pegawais.id_m_skpd')
            ->where(function ($query) {
                    $query->where('t_usulan_pegawais.status_berkas','=','Memenuhi Syarat (MS)')
                          ->orWhere('t_usulan_pegawais.status_berkas','=','Usulan')
                          ->orWhere('t_usulan_pegawais.status_berkas','=','');
                 })
            ->Where('t_usulan_pegawais.status_proses','<>','Selesai')
            ->where('t_usulans.kategori_nomor_usulan','=','Usulan Ujian Dinas')
            ->get();
        } else {

            $model =  T_usulan_pegawai::select('*')
            ->join('t_usulans', 't_usulans.id_usulan', '=', 't_usulan_pegawais.id_usulan')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_usulan_pegawais.nip')
            ->join('t_m_skpds', 't_m_skpds.id_m_skpd', '=', 't_usulan_pegawais.id_m_skpd')
            ->where('t_usulan_pegawais.id_m_skpd','=',$id)
            ->where(function ($query) {
                $query->where('t_usulan_pegawais.status_berkas','=','Memenuhi Syarat (MS)')
                      ->orWhere('t_usulan_pegawais.status_berkas','=','Usulan')
                      ->orWhere('t_usulan_pegawais.status_berkas','=','');
             })
            ->Where('t_usulan_pegawais.status_proses','<>','Selesai')
            ->where('t_usulans.kategori_nomor_usulan','=','Usulan Ujian Dinas')
            ->get();
        }

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action5', [
                    'model2' => "Verifikasi Berkas Usulan Ujian Dinas",
                    'url_edit' => route('data_usulan_ujian_dinas.verifikasi', $model->id_usulan_pegawai)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }


    public function verifikasi_daftar_usulan($id)
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->get();

        $model = T_usulan_pegawai::join('t_usulans','t_usulans.id_usulan','=','t_usulan_pegawais.id_usulan')
                ->join('t_pegawais','t_pegawais.nip','=','t_usulan_pegawais.nip')
                ->where('id_usulan_pegawai', $id)->firstOrFail();

        $jenis_jabatan = DB::table("t_m_jenis_jabatans")->pluck('nama_m_jenis_jabatan', 'id_m_jenis_jabatan');

        $nama_subbidang = DB::table("t_m_skpd_subbidangs")->pluck('nama_m_skpd_subbidang', 'id_m_skpd_subbidang');


        $status_berkas = DB::table("t_m_status_berkas")->pluck('nama_m_status_berkas', 'id_m_status_berkas');
        $status_proses = DB::table("t_m_status_proses")->pluck('nama_m_status_proses', 'id_m_status_proses');


        $data_prajabatan = T_prajabatan_cpns_pns::where('nip', $model->nip)->firstOrFail();



        $sk_pangkat_golongan_terakhir = T_golongan_pegawai:: join(DB::raw('(select max(id_golongan_pegawai) as id_golongan_pegawai from t_golongan_pegawais group by nip)d'), function($join) {
                                            $join->on('t_golongan_pegawais.id_golongan_pegawai','=','d.id_golongan_pegawai')->groupBy('nip'); })
                                        ->where('t_golongan_pegawais.nip','=',$model->nip)
                                        ->first();

        $sk_jabatan_terakhir = T_jabatan_pegawai::join(DB::raw('(select max(id_jabatan) as id_jabatan from t_jabatan_pegawais group by nip)d'), function($join) {
                                    $join->on('t_jabatan_pegawais.id_jabatan','=','d.id_jabatan')->groupBy('nip'); })
                                ->join('t_m_jabatans','t_m_jabatans.id_m_jabatan','=','t_jabatan_pegawais.id_m_jabatan')
                                ->where('t_jabatan_pegawais.nip','=',$model->nip)
                                ->first();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_ujian_dinas.form_daftar_usulan_ujian_dinas', compact('nama_subbidang','status_berkas','status_proses','model', 'pegawai','data_prajabatan','jenis_jabatan','sk_pangkat_golongan_terakhir','sk_jabatan_terakhir'));
    }


    public function update_create_verifikasi(Request $request, $id)
    {
        if ($request->status_proses == "Selesai") {

            $this->validate($request, [
                'nip' => 'required|string|max:255',
                'jenis_ujian_dinas' => 'required',
            ]);

            $path_ujian_dinas = $request->file('path_ujian_dinas');
            $paths = $request->nip;

            $data = [
                        'nip' => $paths,
                        'jenis_ujian_dinas' => $request->jenis_ujian_dinas,
                        'nomor_sertifikat_ujian_dinas' => $request->nomor_sertifikat_ujian_dinas,
                        'tanggal_sertifikat_ujian_dinas' => $request->tanggal_sertifikat_ujian_dinas
                    ];


            if ($path_ujian_dinas) {
                $nama_file_ujian_dinas = 'SERTIFIKAT UJIAN PI '.$request->tanggal_sertifikat_ujian_dinas.'.'.$path_ujian_dinas->getClientOriginalExtension();
                $ujian_dinas = Storage::putFileAs('public/'.$paths, $path_ujian_dinas, $nama_file_ujian_dinas);
                $data['nama_file_ujian_dinas'] = $nama_file_ujian_dinas;
                $data['path_ujian_dinas'] = $ujian_dinas;
            }

            T_ujian_dinas::create($data);

            $model = T_usulan_pegawai::where('id_usulan_pegawai', $id)->firstOrFail();
            $model->update($request->all());


        } else {

            $data2 = [
                'status_proses' => $request->status_proses,
                'status_berkas' => $request->status_berkas,
                'keterangan' => $request->keterangan
            ];

            $model = T_usulan_pegawai::where('id_usulan_pegawai', $id)->firstOrFail();
            $model->update($data2);
        }


    }



}
