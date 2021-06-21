<?php

namespace App\Http\Controllers;

use App\T_m_tingkat_pendidikan;
use App\T_pegawai;
use App\T_pendidikan_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class T_pendidikan_pegawaiController extends Controller
{

    public function index()
    {

        return view('t_views.t_pendidikan_pegawai.pendidikan');
    }


    public function create_pendidikan($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $tingkat_pendidikan = DB::table("t_m_tingkat_pendidikans")->pluck('nama_m_tingkat_pendidikan', 'id_m_tingkat_pendidikan');

        $model = new T_pendidikan_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_pendidikan_pegawai.form', compact('model','model2', 'pegawai', 'tingkat_pendidikan'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255',
            'id_m_tingkat_pendidikan' => 'required',
            'tanggal_ijazah' => 'required|string|max:255',
            'nomor_ijazah' => 'required|string|max:255',
            'nama_sekolah' => 'required|string|max:255'
        ]);

        $path_ijazah = $request->file('path_ijazah');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'id_m_tingkat_pendidikan' => $request->id_m_tingkat_pendidikan,
                    'tanggal_ijazah' => $request->tanggal_ijazah,
                    'nomor_ijazah' => $request->nomor_ijazah,
                    'nama_sekolah' => $request->nama_sekolah
                ];

        $nama_tingkat_pendidikan = T_m_tingkat_pendidikan::where('id_m_tingkat_pendidikan', $request->id_m_tingkat_pendidikan)->firstOrFail();

        if ($path_ijazah) {
            $nama_file_ijazah = 'IJAZAH '.$nama_tingkat_pendidikan->nama_m_tingkat_pendidikan.'.'.$path_ijazah->getClientOriginalExtension();
            $file_ijazah = Storage::putFileAs('public/'.$paths, $path_ijazah, $nama_file_ijazah);
            $data['nama_file_ijazah'] = $nama_file_ijazah;
            $data['path_ijazah'] = $file_ijazah;
        }



        $model = T_pendidikan_pegawai::create($data);
        return $model;
    }


    public function show($id)
    {
        $model = T_pendidikan_pegawai::join('t_m_tingkat_pendidikans','t_m_tingkat_pendidikans.id_m_tingkat_pendidikan','=','t_pendidikan_pegawais.id_m_tingkat_pendidikan')
        ->where('t_pendidikan_pegawais.nip','=',$id)->get();

        return view('t_views.t_pendidikan_pegawai.show', compact('model'));
    }


    public function edit($id_pendidikan_pegawai)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $tingkat_pendidikan = DB::table("t_m_tingkat_pendidikans")->pluck('nama_m_tingkat_pendidikan', 'id_m_tingkat_pendidikan');
        $model = T_pendidikan_pegawai::where('id_pendidikan_pegawai', $id_pendidikan_pegawai)->firstOrFail();

        return view('t_views.t_pendidikan_pegawai.form', compact('model', 'pegawai', 'tingkat_pendidikan'));
    }


    public function update(Request $request, $id_pendidikan_pegawai)
    {

        $path_jazah = $request->file('path_ijazah');

        $paths = $request->nip;

        $data = [
            'nip' => $paths,
            'id_m_tingkat_pendidikan' => $request->id_m_tingkat_pendidikan,
            'tanggal_ijazah' => $request->tanggal_ijazah,
            'nomor_ijazah' => $request->nomor_ijazah,
            'nama_sekolah' => $request->nama_sekolah
        ];

        $hapus = T_pendidikan_pegawai::findOrFail($id_pendidikan_pegawai);
        Storage::disk('local')->delete($hapus->path_ijazah);

        $nama_tingkat_pendidikan = T_m_tingkat_pendidikan::where('id_m_tingkat_pendidikan', $request->id_m_tingkat_pendidikan)->firstOrFail();

        if ($path_jazah) {
            $nama_file_ijazah = 'IJAZAH '.$nama_tingkat_pendidikan->nama_m_tingkat_pendidikan.'.'.$path_jazah->getClientOriginalExtension();
            $file_ijazah = Storage::putFileAs('public/'.$paths, $path_jazah, $nama_file_ijazah);
            $data['nama_file_ijazah'] = $nama_file_ijazah;
            $data['path_ijazah'] = $file_ijazah;
        }

        $model = T_pendidikan_pegawai::where('id_pendidikan_pegawai', $id_pendidikan_pegawai)->firstOrFail();
        $model->update($data);
    }


    public function destroy($id)
    {
        $hapus = T_pendidikan_pegawai::findOrFail($id);
        Storage::disk('local')->delete($hapus->path_ijazah);

        T_pendidikan_pegawai::destroy($id);
    }


    public function download_file_ijazah($id) {
        $download= T_pendidikan_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_ijazah);
    }

    public function data_pendidikan_pegawai(Request $request, $id)
    {
        $model =  T_pendidikan_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_pendidikan_pegawais.nip')
            ->join('t_m_tingkat_pendidikans', 't_m_tingkat_pendidikans.id_m_tingkat_pendidikan', '=', 't_pendidikan_pegawais.id_m_tingkat_pendidikan')
            ->where('t_pendidikan_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Pendidikan Pegawai",
                    'url_show' => route('pendidikan.show', $model->id_pendidikan_pegawai),
                    'url_edit' => route('pendidikan.edit', $model->id_pendidikan_pegawai),
                    'url_destroy' => route('pendidikan.destroy', $model->id_pendidikan_pegawai)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
