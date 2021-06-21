<?php

namespace App\Http\Controllers;

use App\T_golongan_pegawai;
use App\T_m_ruang_golongan;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class T_golongan_pegawaiController extends Controller
{

    public function index()
    {

        return view('t_views.t_golongan_pegawai.golongan');
    }



    public function create_golongan($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $m_ruang_golongan = DB::table("t_m_pangkat_golongans")->pluck('nama_golongan', 'id_m_pangkat_golongan');
        $jenis_kp = DB::table("t_m_jenis_kps")->pluck('nama_m_jenis_kp', 'id_m_jenis_kp');

        $model = new T_golongan_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_golongan_pegawai.form', compact('model','model2', 'pegawai', 'm_ruang_golongan', 'jenis_kp'));
    }


    public function m_jenis_pangkat($id_m_pangkat_golongan)
    {
        $m_jenis_pangkat = DB::table("t_m_pangkat_golongans")->where('id_m_pangkat_golongan', '=', $id_m_pangkat_golongan)->pluck('nama_pangkat', 'id_m_pangkat_golongan');

        return response()->json($m_jenis_pangkat);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255',
            'id_m_pangkat_golongan' => 'required',
            'nomor_sk' => 'required|string|max:255',
            'tanggal_sk' => 'required|string|max:255',
            'tmt_golongan' => 'required|string|max:255',
            'nomor_bkn' => 'required|string|max:255',
            'tanggal_bkn' => 'required|string|max:255',
            'id_m_jenis_kp' => 'required'
        ]);

        $path_sk_kenaikan_pangkat = $request->file('path_sk_kenaikan_pangkat');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'id_m_pangkat_golongan' => $request->id_m_pangkat_golongan,
                    'nomor_sk' => $request->nomor_sk,
                    'tanggal_sk' => $request->tanggal_sk,
                    'tmt_golongan' => $request->tmt_golongan,
                    'nomor_bkn' => $request->nomor_bkn,
                    'tanggal_bkn' => $request->tanggal_bkn
                ];

        if ($path_sk_kenaikan_pangkat) {
            $nama_file_sk_kenaikan_pangkat = 'SK PANGKAT_GOLONGAN_'.$request->tmt_golongan.'.'.$path_sk_kenaikan_pangkat->getClientOriginalExtension();
            $file_kenaikan_pangkat = Storage::putFileAs('public/'.$paths, $path_sk_kenaikan_pangkat, $nama_file_sk_kenaikan_pangkat);
            $data['nama_file_sk_kenaikan_pangkat'] = $nama_file_sk_kenaikan_pangkat;
            $data['path_sk_kenaikan_pangkat'] = $file_kenaikan_pangkat;
        }

        $model = T_golongan_pegawai::create($data);
        return $model;
    }


    public function show($id)
    {
        $model = T_golongan_pegawai::join('t_m_pangkat_golongans','t_m_pangkat_golongans.id_m_pangkat_golongan','=','t_golongan_pegawais.id_m_pangkat_golongan')->where('nip','=',$id)->get();
        return view('t_views.t_golongan_pegawai.show', compact('model'));
    }


    public function edit($id_golongan_pegawai)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $m_ruang_golongan = DB::table("t_m_pangkat_golongans")->pluck('nama_golongan', 'id_m_pangkat_golongan');
        $jenis_kp = DB::table("t_m_jenis_kps")->pluck('nama_m_jenis_kp', 'id_m_jenis_kp');

        $model = T_golongan_pegawai::join('t_m_pangkat_golongans','t_m_pangkat_golongans.id_m_pangkat_golongan','=','t_golongan_pegawais.id_m_pangkat_golongan')
         ->where('t_golongan_pegawais.id_golongan_pegawai', $id_golongan_pegawai)->firstOrFail();

        return view('t_views.t_golongan_pegawai.form', compact('model', 'pegawai', 'm_ruang_golongan', 'jenis_kp'));
    }


    public function update(Request $request, $id_golongan_pegawai)
    {
        $path_sk_kenaikan_pangkat = $request->file('path_sk_kenaikan_pangkat');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'id_m_pangkat_golongan' => $request->id_m_pangkat_golongan,
                    'nomor_sk' => $request->nomor_sk,
                    'tanggal_sk' => $request->tanggal_sk,
                    'tmt_golongan' => $request->tmt_golongan,
                    'nomor_bkn' => $request->nomor_bkn,
                    'tanggal_bkn' => $request->tanggal_bkn
                ];

        $hapus = T_golongan_pegawai::findOrFail($id_golongan_pegawai);
        Storage::disk('local')->delete($hapus->path_sk_kenaikan_pangkat);


        if ($path_sk_kenaikan_pangkat) {
            $nama_file_sk_kenaikan_pangkat = 'SK PANGKAT_GOLONGAN_'.$request->tmt_golongan.'.'.$path_sk_kenaikan_pangkat->getClientOriginalExtension();
            $file_kenaikan_pangkat = Storage::putFileAs('public/'.$paths, $path_sk_kenaikan_pangkat, $nama_file_sk_kenaikan_pangkat);
            $data['nama_file_sk_kenaikan_pangkat'] = $nama_file_sk_kenaikan_pangkat;
            $data['path_sk_kenaikan_pangkat'] = $file_kenaikan_pangkat;
        }

        $model = T_golongan_pegawai::where('id_golongan_pegawai', $id_golongan_pegawai)->firstOrFail();
        $model->update($data);
    }


    public function destroy($id_golongan_pegawai)
    {
        $hapus = T_golongan_pegawai::findOrFail($id_golongan_pegawai);
        Storage::disk('local')->delete($hapus->path_sk_kenaikan_pangkat);

        T_golongan_pegawai::destroy($id_golongan_pegawai);
    }


    public function download_file_sk_pangkat_golongan($id) {
        $download = T_golongan_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_sk_kenaikan_pangkat);
    }


    public function data_golongan_pegawai(Request $request, $id)
    {
        $model =  T_golongan_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_golongan_pegawais.nip')
            ->leftjoin('t_m_pangkat_golongans', 't_m_pangkat_golongans.id_m_pangkat_golongan', '=', 't_golongan_pegawais.id_m_pangkat_golongan')
            ->where('t_golongan_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Golongan Pegawai",
                    'url_show' => route('golongan.show', $model->id_golongan_pegawai),
                    'url_edit' => route('golongan.edit', $model->id_golongan_pegawai),
                    'url_destroy' => route('golongan.destroy', $model->id_golongan_pegawai)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
