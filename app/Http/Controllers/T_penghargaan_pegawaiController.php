<?php

namespace App\Http\Controllers;

use App\T_pegawai;
use App\T_penghargaan_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class T_penghargaan_pegawaiController extends Controller
{

    public function index()
    {
        return view('t_views.t_penghargaan_pegawai.penghargaan');
    }



    public function create_penghargaan($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');

        $model = new T_penghargaan_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_penghargaan_pegawai.form', compact('model','model2', 'pegawai'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255',
            'nama_penghargaan' => 'required|string|max:255',
            'tanggal_perolehan' => 'required|string|max:255',
            'nomor' => 'required|string|max:255',
            'negara_instansi_pemberi' => 'required|string|max:255'
        ]);

        $path_penghargaan = $request->file('path_penghargaan');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'nama_penghargaan' => $request->nama_penghargaan,
                    'tanggal_perolehan' => $request->tanggal_perolehan,
                    'nomor' => $request->nomor,
                    'negara_instansi_pemberi' => $request->negara_instansi_pemberi
                ];

        if ($path_penghargaan) {
            $nama_file_penghargaan = 'PENGHARGAAN_'.$request->tanggal_perolehan.'.'.$path_penghargaan->getClientOriginalExtension();
            $file_penghargaan = Storage::putFileAs('public/'.$paths, $path_penghargaan, $nama_file_penghargaan);
            $data['nama_file_penghargaan'] = $nama_file_penghargaan;
            $data['path_penghargaan'] = $file_penghargaan;
        }


        $model = T_penghargaan_pegawai::create($data);
        return $model;
    }


    public function edit($id_penghargaan)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');

        $model = T_penghargaan_pegawai::where('id_penghargaan', $id_penghargaan)->firstOrFail();

        return view('t_views.t_penghargaan_pegawai.form', compact('model', 'pegawai'));
    }


    public function update(Request $request, $id_penghargaan)
    {
        $path_penghargaan = $request->file('path_penghargaan');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'nama_penghargaan' => $request->nama_penghargaan,
                    'tanggal_perolehan' => $request->tanggal_perolehan,
                    'nomor' => $request->nomor,
                    'negara_instansi_pemberi' => $request->negara_instansi_pemberi
                ];



        if ($path_penghargaan) {

            $hapus = T_penghargaan_pegawai::findOrFail($id_penghargaan);
            return Storage::disk('local')->download($hapus->path_penghargaan);

            $nama_file_penghargaan = 'PENGHARGAAN_'.$request->tanggal_perolehan.'.'.$path_penghargaan->getClientOriginalExtension();
            $file_penghargaan = Storage::putFileAs('public/'.$paths, $path_penghargaan, $nama_file_penghargaan);
            $data['nama_file_penghargaan'] = $nama_file_penghargaan;
            $data['path_penghargaan'] = $file_penghargaan;
        }

        $model = T_penghargaan_pegawai::where('id_penghargaan', $id_penghargaan)->firstOrFail();
        $model->update($data);
    }


    public function destroy($id_penghargaan)
    {
        T_penghargaan_pegawai::destroy($id_penghargaan);
    }


    public function download_file_penghargaan($id) {
        $download = T_penghargaan_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_penghargaan);
    }


    public function data_penghargaan_pegawai(Request $request, $id)
    {
        $model =  T_penghargaan_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_penghargaan_pegawais.nip')
            ->where('t_penghargaan_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Penghargaan Pegawai",
                    'url_show' => route('penghargaan.show', $model->id_penghargaan),
                    'url_edit' => route('penghargaan.edit', $model->id_penghargaan),
                    'url_destroy' => route('penghargaan.destroy', $model->id_penghargaan)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
