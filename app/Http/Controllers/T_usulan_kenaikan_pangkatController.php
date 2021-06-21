<?php

namespace App\Http\Controllers;

use App\T_golongan_pegawai;
use App\T_m_status_berkas;
use App\T_m_status_proses;
use App\T_nomor_usul;
use App\T_pegawai;
use App\T_usulan_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class T_usulan_kenaikan_pangkatController extends Controller
{

    public function index_tms()
    {
        return view('t_views.t_usulan_pegawai.status_berkas_usulan.berkas_tms');
    }


    public function index_btl()
    {
        return view('t_views.t_usulan_pegawai.status_berkas_usulan.berkas_btl');

    }


    public function create()
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->pluck('t_pegawais.nama_pegawai', 't_pegawais.nip');
        $layanan_kp = DB::table("t_m_layanan_kenaikan_pangkats")->pluck('nama_m_layanan_kenaikan_pangkat', 'id_m_layanan_kenaikan_pangkat');
        $pangkat_golongan = DB::table("t_pangkat_golongans")->pluck('nama_golongan', 'id_m_pangkat_golongan');
        $usulan_kp = DB::table("t_m_skpds")->pluck('nama_m_skpd', 'id_m_skpd');

        $model =  new T_usulan_pegawai();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_usulan_kp.form', compact('model', 'pegawai','layanan_kp','pangkat_golongan','usulan_kp'));
    }


    public function pangkat_terakhir($nip)
    {
        $nama_pangkat_terakhir = T_golongan_pegawai::join('t_m_pangkat_golongans','t_m_pangkat_golongans.id_m_pangkat_golongan','=','t_golongan_pegawais.id_m_pangkat_golongan')
                                ->where('nip', '=', $nip)->get();

        return response()->json($nama_pangkat_terakhir);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'id_usulan' => 'required',
            'nomor_usulan' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'id_m_layanan_kenaikan_pangkat' => 'required',
            'id_m_pangkat_golongan' => 'required'
        ]);



        $data = [
            'id_usulan' => $request->id_usulan,
            'nip' => $request->nip,
            'nama_golongan_terakhir' => $request->nama_golongan_terakhir,
            'nama_pangkat_terakhir' => $request->nama_pangkat_terakhir,
            'id_m_layanan_kenaikan_pangkat' => $request->id_m_layanan_kenaikan_pangkat,
            'id_m_pangkat_golongan' => $request->id_m_pangkat_golongan,
            'status_berkas' => $request->status_berkas,
            'status_proses' => $request->status_proses,
            'keterangan' => $request->keterangan,
            'id_m_skpd' => $request->id_m_skpd
        ];


        $model = T_usulan_pegawai::create($data);
        return $model;
    }


    public function show($id)
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->get();

        $layanan_kp = DB::table("t_m_layanan_kenaikan_pangkats")->pluck('nama_m_layanan_kenaikan_pangkat', 'id_m_layanan_kenaikan_pangkat');
        $pangkat_golongan = DB::table("t_m_pangkat_golongans")->pluck('nama_golongan', 'id_m_pangkat_golongan');


        $model = T_nomor_usul::where('nomor_usulan', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_usulan_kp.form', compact('model', 'pegawai','layanan_kp','pangkat_golongan'));
    }


    public function update_status($id)
    {
        $status_berkas = DB::table("t_m_status_berkas")->pluck('nama_m_status_berkas', 'id_m_status_berkas');
        $status_proses = DB::table("t_m_status_proses")->pluck('nama_m_status_proses', 'id_m_status_proses');
        $jenis_kp = DB::table("t_m_jenis_kps")->pluck('nama_m_jenis_kp', 'id_m_jenis_kp');
        $pangkat_golongan = DB::table("t_m_pangkat_golongans")->pluck('nama_golongan', 'id_m_pangkat_golongan');

        $model = T_usulan_pegawai::where('id_usulan_pegawai', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_usulan_kp.form3', compact('model','status_berkas','status_proses','jenis_kp','pangkat_golongan'));
    }


    public function edit($id)
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->get();

        $layanan_kp = DB::table("t_m_layanan_kenaikan_pangkats")->pluck('nama_m_layanan_kenaikan_pangkat', 'id_m_layanan_kenaikan_pangkat');
        $pangkat_golongan = DB::table("t_m_pangkat_golongans")->pluck('nama_golongan', 'id_m_pangkat_golongan');

        $model = T_usulan_pegawai::join('t_usulans','t_usulans.id_usulan','=','t_usulan_pegawais.id_usulan')
                ->where('id_usulan_pegawai', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_usulan_kp.form', compact('model', 'pegawai','layanan_kp','pangkat_golongan'));
    }


    public function update(Request $request, $id)
    {
        $model = T_usulan_pegawai::where('id_usulan_pegawai', $id)->firstOrFail();

        $model->update($request->all());
    }


    public function destroy($id_usulan_pegawai)
    {
        T_usulan_pegawai::destroy($id_usulan_pegawai);
    }


    public function data_daftar_usulan_pegawai($id)
    {
        $model =  T_usulan_pegawai::select('*')
            ->join('t_usulans', 't_usulans.id_usulan', '=', 't_usulan_pegawais.id_usulan')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_usulan_pegawais.nip')
            ->join('t_m_layanan_kenaikan_pangkats', 't_m_layanan_kenaikan_pangkats.id_m_layanan_kenaikan_pangkat', '=', 't_usulan_pegawais.id_m_layanan_kenaikan_pangkat')
            ->join('t_m_pangkat_golongans', 't_m_pangkat_golongans.id_m_pangkat_golongan', '=', 't_usulan_pegawais.id_m_pangkat_golongan')
            ->where('t_usulans.nomor_usulan','=',$id)
            ->where('t_usulan_pegawais.status_berkas','=','Usulan')
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Daftar Nama-Nama Usulan Kenaikan Pangkat",
                    'url_edit' => route('usulan_layanan_kenaikan_pangkat.edit', $model->id_usulan_pegawai),
                    'url_destroy' => route('usulan_layanan_kenaikan_pangkat.destroy', $model->id_usulan_pegawai)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }


    public function daftar_usulan_tms()
    {
        $model =  T_usulan_pegawai::select('*')
            ->join('t_usulans', 't_usulans.id_usulan', '=', 't_usulan_pegawais.id_usulan')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_usulan_pegawais.nip')
            ->join('t_m_layanan_kenaikan_pangkats', 't_m_layanan_kenaikan_pangkats.id_m_layanan_kenaikan_pangkat', '=', 't_usulan_pegawais.id_m_layanan_kenaikan_pangkat')
            ->join('t_m_pangkat_golongans', 't_m_pangkat_golongans.id_m_pangkat_golongan', '=', 't_usulan_pegawais.id_m_pangkat_golongan')
            ->where('t_usulan_pegawais.status_berkas','=','Tidak Memenuhi Syarat (TMS)')
            ->where('t_usulan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action4', [
                    'model' => $model,
                    'model2' => "Daftar Pegawai TMS",
                    'url_edit' => route('usulan_layanan_kenaikan_pangkat.edit', $model->id_usulan_pegawai),
                    'url_destroy' => route('usulan_layanan_kenaikan_pangkat.destroy', $model->id_usulan_pegawai)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }


    public function daftar_usulan_btl()
    {
        $model =  T_usulan_pegawai::select('*')
            ->join('t_usulans', 't_usulans.id_usulan', '=', 't_usulan_pegawais.id_usulan')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_usulan_pegawais.nip')
            ->join('t_m_layanan_kenaikan_pangkats', 't_m_layanan_kenaikan_pangkats.id_m_layanan_kenaikan_pangkat', '=', 't_usulan_pegawais.id_m_layanan_kenaikan_pangkat')
            ->join('t_m_pangkat_golongans', 't_m_pangkat_golongans.id_m_pangkat_golongan', '=', 't_usulan_pegawais.id_m_pangkat_golongan')
            ->where('t_usulan_pegawais.status_berkas','=','Berkas Tidak Lengkap (BTL)')
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action4', [
                    'model' => $model,
                    'model2' => "Daftar Nama-Nama Usulan Kenaikan Pangkat",
                    'url_edit' => route('usulan_layanan_kenaikan_pangkat.edit', $model->id_usulan_pegawai),
                    'url_destroy' => route('usulan_layanan_kenaikan_pangkat.destroy', $model->id_usulan_pegawai)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }


}
