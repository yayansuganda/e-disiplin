<?php

namespace App\Http\Controllers;

use App\T_golongan_pegawai;
use App\T_kgb_pegawai;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class T_kgb_pegawaiController extends Controller
{
    public function index()
    {
        return view('t_views.t_kgb.kgb');
    }


    public function create_kgb($id)
    {

        $model = new T_kgb_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();
        $model3 = T_golongan_pegawai::join('t_m_pangkat_golongans','t_m_pangkat_golongans.id_m_pangkat_golongan','=','t_golongan_pegawais.id_m_pangkat_golongan')
                  ->whereIn('t_golongan_pegawais.tmt_golongan',function($query) {
                    $query->select(DB::raw('t_golongan_pegawais.tmt_golongan'))->from('t_golongan_pegawais')->groupBy('t_golongan_pegawais.nip');
                    })
                  ->where('t_golongan_pegawais.nip','=',$id)
                  ->orderBy('t_golongan_pegawais.tmt_golongan','DESC')
                  ->firstOrFail();

        $m_ruang_golongan = DB::table("t_m_pangkat_golongans")->pluck('nama_golongan', 'nama_golongan');

        return view('t_views.t_kgb.form', compact('m_ruang_golongan','model','model2','model3'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255'
        ]);

        $path_sk_kgb = $request->file('path_sk_kgb');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'nama_golongan' => $request->nama_golongan,
                    'nama_pangkat' => $request->nama_pangkat,
                    'tmt_kgb' => $request->tmt_kgb,
                    'gaji_pokok' => $request->gaji_pokok,
                    'nomor_sk_kgb' => $request->nomor_sk_kgb,
                    'tanggal_sk_kgb' => $request->tanggal_sk_kgb,
                    'pejabat_penandatangan_kgb' => $request->pejabat_penandatangan_kgb
                ];

        if ($path_sk_kgb) {
            $nama_file_sk_kgb = 'KGB '.$request->tmt_kgb.'.'.$path_sk_kgb->getClientOriginalExtension();
            $file_sk_kgb = Storage::putFileAs('public/'.$paths, $path_sk_kgb, $nama_file_sk_kgb);
            $data['nama_file_sk_kgb'] = $nama_file_sk_kgb;
            $data['path_sk_kgb'] = $file_sk_kgb;
        }

        $model = T_kgb_pegawai::create($data);
        return $model;
    }


    public function edit($id)
    {

        $m_ruang_golongan = DB::table("t_m_pangkat_golongans")->pluck('nama_golongan', 'nama_golongan');

        $model = T_kgb_pegawai::where('id_kgb', $id)->firstOrFail();

        return view('t_views.t_kgb.form', compact('model','m_ruang_golongan'));
    }



    public function update(Request $request, $id)
    {
        $path_sk_kgb = $request->file('path_sk_kgb');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'nama_golongan' => $request->nama_golongan,
                    'nama_pangkat' => $request->nama_pangkat,
                    'tmt_kgb' => $request->tmt_kgb,
                    'gaji_pokok' => $request->gaji_pokok,
                    'nomor_sk_kgb' => $request->nomor_sk_kgb,
                    'tanggal_sk_kgb' => $request->tanggal_sk_kgb
                ];

        $hapus = T_kgb_pegawai::findOrFail($id);
        Storage::disk('local')->delete($hapus->path_sk_kgb);

        if ($path_sk_kgb) {
            $nama_file_sk_kgb = 'KGB '.$request->tmt_kgb.'.'.$path_sk_kgb->getClientOriginalExtension();
            $file_sk_kgb = Storage::putFileAs('public/'.$paths, $path_sk_kgb, $nama_file_sk_kgb);
            $data['nama_file_sk_kgb'] = $nama_file_sk_kgb;
            $data['path_sk_kgb'] = $file_sk_kgb;
        }

        $model = T_kgb_pegawai::where('id_kgb', $id)->firstOrFail();
        $model->update($data);
    }


    public function destroy($id)
    {
        $hapus = T_kgb_pegawai::findOrFail($id);
        Storage::disk('local')->delete($hapus->path_sk_kgb);
        T_kgb_pegawai::destroy($id);
    }


    public function download_file_sk_kgb($id) {
        $download = T_kgb_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_sk_kgb);
    }

    public function data_kgb_pegawai(Request $request, $id)
    {
        $model =  T_kgb_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_kgb_pegawais.nip')
             ->where('t_kgb_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data KGB",
                    'url_edit' => route('kgb.edit', $model->id_kgb),
                    'url_destroy' => route('kgb.destroy', $model->id_kgb)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
