<?php

namespace App\Http\Controllers;

use App\T_pak_pegawai;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class T_pak_pegawaiController extends Controller
{
    public function create_pak($id)
    {
        $jabatan_pegawai = DB::table("t_jabatan_pegawais")
                                ->where('nip','=',$id)
                                ->pluck('nama_m_jabatan', 'id_jabatan');

        $model = new T_pak_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_pak_pegawai.form', compact('model','model2', 'jabatan_pegawai'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255'
        ]);

        $path_pak = $request->file('path_pak');
        $paths = $request->nip;
        $data = [
                    'nip' => $paths,
                    'nomor_sk_pak' => $request->nomor_sk_pak,
                    'tanggal_sk_pak' => $request->tanggal_sk_pak,
                    'bulan_mulai_penilaian' => $request->bulan_mulai_penilaian,
                    'bulan_selesai_penilaian' => $request->bulan_selesai_penilaian,
                    'tahun_mulai_penilaian' => $request->tahun_mulai_penilaian,
                    'tahun_selesai_penilaian' => $request->tahun_selesai_penilaian,
                    'kredit_utama_baru' => $request->kredit_utama_baru,
                    'kredit_penunjang_baru' => $request->kredit_penunjang_baru,
                    'total_kredit_baru' => $request->total_kredit_baru,
                    'id_jabatan' => $request->id_jabatan
                ];

        if ($path_pak) {
            $nama_file_pak = 'PAK '.$request->tanggal_sk_pak.'.'.$path_pak->getClientOriginalExtension();
            $file_pak = Storage::putFileAs('public/'.$paths, $path_pak, $nama_file_pak);
            $data['nama_file_pak'] = $nama_file_pak;
            $data['path_pak'] = $file_pak;
        }


        $model = T_pak_pegawai::create($data);
        return $model;
    }


    public function edit($id_pak)
    {


        $model = T_pak_pegawai::where('id_pak', $id_pak)->firstOrFail();

        $jabatan_pegawai = DB::table("t_jabatan_pegawais")
                                ->where('nip','=',$model->nip)
                                ->pluck('nama_m_jabatan', 'id_jabatan');

        return view('t_views.t_pak_pegawai.form', compact('model', 'jabatan_pegawai'));
    }


    public function update(Request $request, $id_pak)
    {
        $path_pak = $request->file('path_pak');
        $paths = $request->nip;
        $data = [
                    'nip' => $paths,
                    'nomor_sk_pak' => $request->nomor_sk_pak,
                    'tanggal_sk_pak' => $request->tanggal_sk_pak,
                    'bulan_mulai_penilaian' => $request->bulan_mulai_penilaian,
                    'bulan_selesai_penilaian' => $request->bulan_selesai_penilaian,
                    'tahun_mulai_penilaian' => $request->tahun_mulai_penilaian,
                    'tahun_selesai_penilaian' => $request->tahun_selesai_penilaian,
                    'kredit_utama_baru' => $request->kredit_utama_baru,
                    'kredit_penunjang_baru' => $request->kredit_penunjang_baru,
                    'total_kredit_baru' => $request->total_kredit_baru,
                    'id_jabatan' => $request->id_jabatan
                ];

        if ($path_pak) {

            $hapus = T_pak_pegawai::findOrFail($id_pak);
            Storage::disk('local')->download($hapus->path_pak);

            $nama_file_pak = 'PAK '.$request->tanggal_sk_pak.'.'.$path_pak->getClientOriginalExtension();
            $file_pak = Storage::putFileAs('public/'.$paths, $path_pak, $nama_file_pak);
            $data['nama_file_pak'] = $nama_file_pak;
            $data['path_pak'] = $file_pak;
        }

        $model = T_pak_pegawai::where('id_pak', $id_pak)->firstOrFail();
        $model->update($data);
    }


    public function destroy($id_pak)
    {
        $hapus = T_pak_pegawai::findOrFail($id_pak);
        Storage::disk('local')->download($hapus->path_pak);

        T_pak_pegawai::destroy($id_pak);
    }


    public function download_file_pak($id) {
        $download = T_pak_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_pak);
    }


    public function data_pak_pegawai(Request $request, $id)
    {
        $model =  T_pak_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_pak_pegawais.nip')
            ->join('t_jabatan_pegawais', 't_jabatan_pegawais.id_jabatan', '=', 't_pak_pegawais.id_jabatan')
            ->where('t_pak_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data PAK Pegawai",
                    'url_show' => route('pak.show', $model->id_pak),
                    'url_edit' => route('pak.edit', $model->id_pak),
                    'url_destroy' => route('pak.destroy', $model->id_pak)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
