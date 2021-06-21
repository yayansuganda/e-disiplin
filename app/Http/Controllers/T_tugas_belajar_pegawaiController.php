<?php

namespace App\Http\Controllers;

use App\T_pegawai;
use App\T_tugas_belajar_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class T_tugas_belajar_pegawaiController extends Controller
{

    public function index()
    {
        return view('t_views.t_tugas_belajar.tugas_belajar');
    }


    public function create_tugas_belajar($id)
    {

        $model = new T_tugas_belajar_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_tugas_belajar_pegawai.form', compact('model','model2'));
    }


    public function store(Request $request)
    {

        $path_sk_tugas_belajar = $request->file('path_sk_tugas_belajar');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'nama_sekolah_universitas'=> $request->nama_sekolah_universitas,
                    'nomor_sk_tugas_belajar' => $request->nomor_sk_tugas_belajar,
                    'tanggal_sk_tugas_belajar' => $request->tanggal_sk_tugas_belajar
                ];

        if ($path_sk_tugas_belajar) {
            $nama_sk_tugas_belajar = 'SK TUGAS BELAJAR '.$request->tanggal_sk_tugas_belajar.'.'.$path_sk_tugas_belajar->getClientOriginalExtension();
            $file_tugas_belajar = Storage::putFileAs('public/'.$paths, $path_sk_tugas_belajar, $nama_sk_tugas_belajar);
            $data['nama_file_sk_tugas_belajar'] = $nama_sk_tugas_belajar;
            $data['path_sk_tugas_belajar'] = $file_tugas_belajar;
        }

        $model = T_tugas_belajar_pegawai::create($data);
        return $model;
    }



    public function edit($id)
    {

        $model = T_tugas_belajar_pegawai::where('id_tugas_belajar', $id)->firstOrFail();

        return view('t_views.t_tugas_belajar_pegawai.form', compact('model'));
    }


    public function update(Request $request, $id)
    {
        $path_sk_tugas_belajar = $request->file('path_sk_tugas_belajar');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'nama_sekolah_universitas'=> $request->nama_sekolah_universitas,
                    'nomor_sk_tugas_belajar' => $request->nomor_sk_tugas_belajar,
                    'tanggal_sk_tugas_belajar' => $request->tanggal_sk_tugas_belajar
                ];

        if ($path_sk_tugas_belajar) {
            $nama_sk_tugas_belajar = 'SK TUGAS BELAJAR '.$request->tanggal_sk_tugas_belajar.'.'.$path_sk_tugas_belajar->getClientOriginalExtension();
            $file_tugas_belajar = Storage::putFileAs('public/'.$paths, $path_sk_tugas_belajar, $nama_sk_tugas_belajar);
            $data['nama_file_sk_tugas_belajar'] = $nama_sk_tugas_belajar;
            $data['path_sk_tugas_belajar'] = $file_tugas_belajar;
        }

        $hapus_file = T_tugas_belajar_pegawai::findOrFail($id);
        Storage::disk('local')->delete($hapus_file->path_sk_tugas_belajar);

        $model = T_tugas_belajar_pegawai::where('id_tugas_belajar', $id)->firstOrFail();
        $model->update($data);
    }


    public function destroy($id)
    {
        $model = T_tugas_belajar_pegawai::findOrFail($id);
        Storage::disk('local')->delete($model->path_sk_tugas_belajar);

        T_tugas_belajar_pegawai::destroy($id);
    }

    public function download($id) {

        $model = T_tugas_belajar_pegawai::findOrFail($id);

        return Storage::disk('local')->download($model->path_sk_tugas_belajar);
    }

    public function data_tugas_belajar_pegawai(Request $request, $id)
    {
        $model =  T_tugas_belajar_pegawai::where('nip','=',$id)->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Tugas Belajar",
                    'url_edit' => route('tugas_belajar.edit', $model->id_tugas_belajar),
                    'url_destroy' => route('tugas_belajar.destroy', $model->id_tugas_belajar)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
