<?php

namespace App\Http\Controllers;

use App\T_cuti_pegawai;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class T_cuti_pegawaiController extends Controller
{

    public function index()
    {
        return view('t_views.t_cuti.cuti');
    }


    public function create_cuti($id)
    {

        $jenis_cuti = DB::table("t_m_jenis_cutis")->get();

        $model = new T_cuti_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_cuti.form', compact('model','model2', 'jenis_cuti'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255',
            'jenis_cuti' => 'required|string|max:255'
        ]);

        $path_sk_cuti = $request->file('path_sk_cuti');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'jenis_cuti' => $request->jenis_cuti,
                    'nomor_sk_cuti' => $request->nomor_sk_cuti,
                    'tanggal_sk_cuti' => $request->tanggal_sk_cuti,
                    'tanggal_mulai_cuti' => $request->tanggal_mulai_cuti,
                    'tanggal_selesai_cuti' => $request->tanggal_selesai_cuti
                ];

        if ($path_sk_cuti) {
            $nama_file_sk_cuti = 'CUTI '.$request->tanggal_mulai_cuti.'.'.$path_sk_cuti->getClientOriginalExtension();
            $file_sk_cuti = Storage::putFileAs('public/'.$paths, $path_sk_cuti, $nama_file_sk_cuti);
            $data['nama_file_sk_cuti'] = $nama_file_sk_cuti;
            $data['path_sk_cuti'] = $file_sk_cuti;
        }

        $model = T_cuti_pegawai::create($data);
        return $model;
    }


    public function edit($id)
    {

        $jenis_cuti = DB::table("t_m_jenis_cutis")->get();


        $model = T_cuti_pegawai::where('id_cuti', $id)->firstOrFail();

        return view('t_views.t_cuti.form', compact('model', 'jenis_cuti'));
    }



    public function update(Request $request, $id)
    {
        $path_sk_cuti = $request->file('path_sk_cuti');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'jenis_cuti' => $request->jenis_cuti,
                    'nomor_sk_cuti' => $request->nomor_sk_cuti,
                    'tanggal_sk_cuti' => $request->tanggal_sk_cuti,
                    'tanggal_mulai_cuti' => $request->tanggal_mulai_cuti,
                    'tanggal_selesai_cuti' => $request->tanggal_selesai_cuti
                ];

        $hapus = T_cuti_pegawai::findOrFail($id);
        Storage::disk('local')->delete($hapus->path_sk_cuti);

        if ($path_sk_cuti) {
            $nama_file_sk_cuti = 'DIKLAT '.$request->tanggal_mulai.'.'.$path_sk_cuti->getClientOriginalExtension();
            $file_sk_cuti = Storage::putFileAs('public/'.$paths, $path_sk_cuti, $nama_file_sk_cuti);
            $data['nama_file_sk_cuti'] = $nama_file_sk_cuti;
            $data['paht_sk_cuti'] = $file_sk_cuti;
        }

        $model = T_cuti_pegawai::where('id_cuti', $id)->firstOrFail();
        $model->update($data);
    }


    public function destroy($id)
    {
        $hapus = T_cuti_pegawai::findOrFail($id);
        Storage::disk('local')->delete($hapus->path_sk_cuti);

        T_cuti_pegawai::destroy($id);
    }


    public function download_file_sk_cuti($id) {
        $download = T_cuti_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_sk_cuti);
    }


    public function data_cuti_pegawai(Request $request, $id)
    {
        $model =  T_cuti_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_cuti_pegawais.nip')
            ->where('t_cuti_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Cuti",
                    'url_edit' => route('cuti.edit', $model->id_cuti),
                    'url_destroy' => route('cuti.destroy', $model->id_cuti)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
