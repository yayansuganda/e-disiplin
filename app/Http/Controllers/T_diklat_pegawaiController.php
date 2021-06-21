<?php

namespace App\Http\Controllers;

use App\T_diklat_pegawai;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class T_diklat_pegawaiController extends Controller
{

    public function index()
    {
        return view('t_views.t_diklat_pegawai.diklat');
    }


    public function create_diklat($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $jenis_diklat = DB::table("t_m_jenis_diklats")->pluck('nama_m_jenis_diklat', 'nama_m_jenis_diklat');

        $model = new T_diklat_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_diklat_pegawai.form', compact('model','model2', 'pegawai', 'jenis_diklat'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255',
            'jenis_diklat' => 'required|string|max:255',
            'nama_diklat' => 'required|string|max:255',
            'tanggal_mulai' => 'required|string|max:255',
            'tanggal_selesai' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'alamat_diklat' => 'required|string|max:255'
        ]);

        $path_diklat = $request->file('path_diklat');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'jenis_diklat' => $request->jenis_diklat,
                    'nama_diklat' => $request->nama_diklat,
                    'tanggal_mulai' => $request->tanggal_mulai,
                    'tanggal_selesai' => $request->tanggal_selesai,
                    'penyelenggara' => $request->penyelenggara,
                    'alamat_diklat' => $request->alamat_diklat
                ];

        if ($path_diklat) {
            $nama_file_diklat = 'DIKLAT '.$request->tanggal_mulai.'.'.$path_diklat->getClientOriginalExtension();
            $file_diklat = Storage::putFileAs('public/'.$paths, $path_diklat, $nama_file_diklat);
            $data['nama_file_diklat'] = $nama_file_diklat;
            $data['path_diklat'] = $file_diklat;
        }

        $model = T_diklat_pegawai::create($data);
        return $model;
    }


    public function show($id)
    {
        $model = T_diklat_pegawai::where('nip','=',$id)->get();
        return view('t_views.t_diklat_pegawai.show', compact('model'));
    }



    public function edit($id_diklat)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $jenis_diklat = DB::table("t_m_jenis_diklats")->pluck('nama_m_jenis_diklat', 'nama_m_jenis_diklat');


        $model = T_diklat_pegawai::where('id_diklat', $id_diklat)->firstOrFail();

        return view('t_views.t_diklat_pegawai.form', compact('model', 'pegawai', 'jenis_diklat'));
    }



    public function update(Request $request, $id_diklat)
    {
        $path_diklat = $request->file('path_diklat');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'jenis_diklat' => $request->jenis_diklat,
                    'nama_diklat' => $request->nama_diklat,
                    'tanggal_mulai' => $request->tanggal_mulai,
                    'tanggal_selesai' => $request->tanggal_selesai,
                    'penyelenggara' => $request->penyelenggara,
                    'alamat_diklat' => $request->alamat_diklat
                ];

        $hapus = T_diklat_pegawai::findOrFail($id_diklat);
        Storage::disk('local')->delete($hapus->path_diklat);

        if ($path_diklat) {
            $nama_file_diklat = 'DIKLAT '.$request->tanggal_mulai.'.'.$path_diklat->getClientOriginalExtension();
            $file_diklat = Storage::putFileAs('public/'.$paths, $path_diklat, $nama_file_diklat);
            $data['nama_file_diklat'] = $nama_file_diklat;
            $data['path_diklat'] = $file_diklat;
        }

        $model = T_diklat_pegawai::where('id_diklat', $id_diklat)->firstOrFail();
        $model->update($data);
    }



    public function destroy($id)
    {
        $hapus = T_diklat_pegawai::findOrFail($id);
        Storage::disk('local')->delete($hapus->path_diklat);
        T_diklat_pegawai::destroy($id);
    }


    public function download_file_diklat($id) {
        $download = T_diklat_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_diklat);
    }

    public function data_diklat_pegawai(Request $request, $id)
    {
        $model =  T_diklat_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_diklat_pegawais.nip')
            ->where('t_diklat_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Diklat Pegawai",
                    'url_show' => route('diklat.show', $model->id_diklat),
                    'url_edit' => route('diklat.edit', $model->id_diklat),
                    'url_destroy' => route('diklat.destroy', $model->id_diklat)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
