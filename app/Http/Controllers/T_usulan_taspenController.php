<?php

namespace App\Http\Controllers;

use App\T_nomor_usul;
use App\T_pegawai;
use App\T_prajabatan_cpns_pns;
use App\T_usulan_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class T_usulan_taspenController extends Controller
{
    public function data_usulan_taspen($id)
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
                    'model2' => "Daftar Usulan Taspen",
                    'url_edit' => route('usulan_taspen.edit', $model->id_usulan_pegawai),
                    'url_destroy' => route('usulan_taspen.destroy', $model->id_usulan_pegawai)
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

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_taspen.form', compact('model', 'pegawai','model2'));
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

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_taspen.form', compact('model', 'pegawai'));
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
    public function index_daftar_usulan_taspen()
    {
        $nama_skpd = T_usulan_pegawai::join('t_m_skpds','t_m_skpds.id_m_skpd','=','t_usulan_pegawais.id_m_skpd')
        ->groupBy('t_usulan_pegawais.id_m_skpd')
        ->pluck('t_m_skpds.nama_m_skpd', 't_m_skpds.id_m_skpd');

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_taspen.daftar_usulan_taspen', compact('nama_skpd'));
    }



    public function daftar_usulan_taspen($id)
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
            ->where('t_usulans.kategori_nomor_usulan','=','Usulan Taspen')
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
            ->where('t_usulans.kategori_nomor_usulan','=','Usulan Taspen')
            ->get();
        }

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action5', [
                    'model2' => "Verifikasi Berkas Usulan Taspen",
                    'url_edit' => route('data_usulan_taspen.verifikasi', $model->id_usulan_pegawai)
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

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_taspen.form_daftar_usulan_taspen', compact('nama_subbidang','status_berkas','status_proses','model', 'pegawai','data_prajabatan','jenis_jabatan'));
    }



    public function update_create_verifikasi(Request $request, $id)
    {
        if ($request->status_proses == "Selesai") {

            $path_taspen = $request->file('path_taspen');
            $paths = $request->nip;

            $hapus = T_prajabatan_cpns_pns::where('nip','=',$paths)->firstOrFail();
            Storage::disk('local')->delete($hapus->path_taspen);


            $data =  ['taspen' => $request->taspen];


            if ($path_taspen) {
                $nama_file_taspen = 'TASPEN.'.$path_taspen->getClientOriginalExtension();
                $file_taspen = Storage::putFileAs('public/'.$paths, $path_taspen, $nama_file_taspen);
                $data['path_taspen'] = $file_taspen;
                $data['nama_file_taspen'] = $nama_file_taspen;
            }

            T_prajabatan_cpns_pns::where('nip','=', $paths)->update($data);

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
