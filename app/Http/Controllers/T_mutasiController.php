<?php

namespace App\Http\Controllers;

use App\T_mutasi;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class T_mutasiController extends Controller
{




    public function create_mutasi($id)
    {

        $model = new T_mutasi();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();
        $nama_skpd = DB::table("t_m_skpds")->pluck('nama_m_skpd', 'id_m_skpd');

        return view('t_views.t_mutasi.form', compact('model','model2','nama_skpd'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255',
            'jenis_mutasi' => 'required',
        ]);

        $path_sk_mutasi = $request->file('path_sk_mutasi');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'jenis_mutasi' => $request->jenis_mutasi,
                    'instansi_unit_kerja_baru' => $request->instansi_unit_kerja_baru,
                    'nomor_sk_mutasi' => $request->nomor_sk_mutasi,
                    'tanggal_sk_mutasi' => $request->tanggal_sk_mutasi
                ];


        if ($path_sk_mutasi) {
            $nama_file_sk_mutasi = 'SK MUTASI '.$request->tanggal_sk_mutasi.'.'.$path_sk_mutasi->getClientOriginalExtension();
            $file_sk_mutasi = Storage::putFileAs('public/'.$paths, $path_sk_mutasi, $nama_file_sk_mutasi);
            $data['nama_file_sk_mutasi'] = $nama_file_sk_mutasi;
            $data['path_sk_mutasi'] = $file_sk_mutasi;
        }

        $model = T_mutasi::create($data);
        return $model;
    }


    public function edit($id)
    {

        $model = T_mutasi::where('id_mutasi', $id)->firstOrFail();
        $nama_skpd = DB::table("t_m_skpds")->pluck('nama_m_skpd', 'id_m_skpd');

        return view('t_views.t_mutasi.form', compact('model','nama_skpd'));
    }



    public function update(Request $request, $id)
    {

        $path_sk_mutasi = $request->file('path_sk_mutasi');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'jenis_mutasi' => $request->jenis_mutasi,
                    'instansi_unit_kerja_baru' => $request->instansi_unit_kerja_baru,
                    'nomor_sk_mutasi' => $request->nomor_sk_mutasi,
                    'tanggal_sk_mutasi' => $request->tanggal_sk_mutasi
                ];

        $hapus = T_mutasi::where('nip','=',$id)->firstOrFail();
        Storage::disk('local')->delete($hapus->path_sk_mutasi);


        if ($path_sk_mutasi) {
            $nama_file_sk_mutasi = 'SK MUTASI '.$request->tanggal_sk_mutasi.'.'.$path_sk_mutasi->getClientOriginalExtension();
            $file_sk_mutasi = Storage::putFileAs('public/'.$paths, $path_sk_mutasi, $nama_file_sk_mutasi);
            $data['nama_file_sk_mutasi'] = $nama_file_sk_mutasi;
            $data['path_sk_mutasi'] = $file_sk_mutasi;
        }

        $model = T_mutasi::where('id_mutasi', $id)->firstOrFail();
        $model->update($data);
    }


    public function destroy($id)
    {
        $hapus = T_mutasi::findOrFail($id);
        Storage::disk('local')->download($hapus->path_sk_mutasi);

        T_mutasi::destroy($id);
    }

    public function download_file_sk_mutasi($id) {
        $download = T_mutasi::findOrFail($id);
        return Storage::disk('local')->download($download->path_sk_mutasi);
    }


    public function data_mutasi_pegawai(Request $request, $id)
    {
        $model =  T_mutasi::select('t_mutasis.*','t_m_skpds.nama_m_skpd')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_mutasis.nip')
            ->join('t_m_skpds','t_m_skpds.id_m_skpd','=','t_mutasis.instansi_unit_kerja_baru')
            ->where('t_mutasis.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                    return view('layouts._action2', [
                        'model' => $model,
                        'model2' => "Data Mutasi",
                        'url_edit' => route('mutasi.edit', $model->id_mutasi),
                        'url_destroy' => route('mutasi.destroy', $model->id_mutasi)
                    ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
