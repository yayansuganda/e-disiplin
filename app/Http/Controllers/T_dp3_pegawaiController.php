<?php

namespace App\Http\Controllers;

use App\T_dp3_pegawai;
use App\T_golongan_pegawai;
use App\T_jabatan_pegawai;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class T_dp3_pegawaiController extends Controller
{


    public function create_dp3($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $m_ruang_golongan = DB::table("t_m_ruang_golongans")->pluck('nama_m_ruang_golongan', 'id_m_ruang_golongan');

        $model = new T_dp3_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_dp3_pegawai.form', compact('model','model2', 'pegawai', 'm_ruang_golongan'));
    }

    public function jabatan_pegawai_pp($nip)
    {
        $nama_jabatan = T_jabatan_pegawai::where('nip','=',$nip)
                    ->orderBy('id_jabatan','desc')
                    ->limit(1)
                    ->get();

        $nama_golongan_pangkat = T_golongan_pegawai::join('t_m_pangkat_golongans','t_m_pangkat_golongans.id_m_pangkat_golongan','=','t_golongan_pegawais.id_m_pangkat_golongan')
                    ->where('t_golongan_pegawais.nip','=',$nip)
                    ->orderBy('t_golongan_pegawais.created_at','desc')
                    ->limit(1)
                    ->get();

        return json_encode(array(
            "nama_jabatan" => $nama_jabatan,
            "nama_golongan_pangkat" => $nama_golongan_pangkat
        ));
    }

    public function jabatan_pegawai_atasan_pp($nip)
    {
        $nama_jabatan = T_jabatan_pegawai::where('t_jabatan_pegawais.nip','=',$nip)
        ->orderBy('t_jabatan_pegawais.id_jabatan','desc')
        ->limit(1)
        ->get();

        $nama_golongan_pangkat = T_golongan_pegawai::join('t_m_pangkat_golongans','t_m_pangkat_golongans.id_m_pangkat_golongan','=','t_golongan_pegawais.id_m_pangkat_golongan')
                ->where('t_golongan_pegawais.nip','=',$nip)
                ->orderBy('t_golongan_pegawais.created_at','desc')
                ->limit(1)
                ->get();

        return json_encode(array(
        "nama_jabatan" => $nama_jabatan,
        "nama_golongan_pangkat" => $nama_golongan_pangkat
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $path_dp3 = $request->file('path_dp3');
        $paths = $request->nip;
        $data = [
                    'nip' => $paths,
                    'tahun_penilaian' => $request->tahun_penilaian,
                    'kesetiaan' => $request->kesetiaan,
                    'prestasi_kerja' => $request->prestasi_kerja,
                    'tanggung_jawab' => $request->tanggung_jawab,
                    'ketaatan' => $request->ketaatan,
                    'kejujuran' => $request->kejujuran,
                    'kerjasama' => $request->kerjasama,
                    'prakarsa' => $request->prakarsa,
                    'kepemimpinan' => $request->kepemimpinan,
                    'nip_pp' => $request->nip_pp,
                    'nama_jabatan_pp' => $request->nama_jabatan_pp,
                    'nama_golongan_pp' => $request->nama_golongan_pp,
                    'nama_pangkat_pp' => $request->nama_pangkat_pp,
                    'instansi_kerja_pp' => $request->instansi_kerja_pp,
                    'nip_atasan_pp' => $request->nip_atasan_pp,
                    'nama_jabatan_atasan_pp' => $request->nama_jabatan_atasan_pp,
                    'nama_golongan_atasan_pp' => $request->nama_golongan_atasan_pp,
                    'nama_pangkat_atasan_pp' => $request->nama_pangkat_atasan_pp,
                    'instansi_kerja_atasan_pp' => $request->instansi_kerja_atasan_pp
                ];

        if ($path_dp3) {
            $nama_file_path_dp3 = 'DP3 '.$request->tahun_penilaian.'.'.$path_dp3->getClientOriginalExtension();
            $file_dp3 = Storage::putFileAs('public/'.$paths, $path_dp3, $nama_file_path_dp3);
            $data['nama_file_dp3'] = $nama_file_path_dp3;
            $data['path_dp3'] = $file_dp3;
        }

        $model = T_dp3_pegawai::create($data);
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id_dp3)
    {

        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $model = T_dp3_pegawai::where('id_dp3', $id_dp3)->firstOrFail();

        return view('t_views.t_dp3_pegawai.form', compact('model', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_dp3)
    {
        $path_dp3 = $request->file('path_dp3');
        $paths = $request->nip;
        $data = [
                    'nip' => $paths,
                    'tahun_penilaian' => $request->tahun_penilaian,
                    'kesetiaan' => $request->kesetiaan,
                    'prestasi_kerja' => $request->prestasi_kerja,
                    'tanggung_jawab' => $request->tanggung_jawab,
                    'ketaatan' => $request->ketaatan,
                    'kejujuran' => $request->kejujuran,
                    'kerjasama' => $request->kerjasama,
                    'prakarsa' => $request->prakarsa,
                    'kepemimpinan' => $request->kepemimpinan,
                    'nip_pp' => $request->nip_pp,
                    'nama_jabatan_pp' => $request->nama_jabatan_pp,
                    'nama_golongan_pp' => $request->nama_golongan_pp,
                    'nama_pangkat_pp' => $request->nama_pangkat_pp,
                    'instansi_kerja_pp' => $request->instansi_kerja_pp,
                    'nip_atasan_pp' => $request->nip_atasan_pp,
                    'nama_jabatan_atasan_pp' => $request->nama_jabatan_atasan_pp,
                    'nama_golongan_atasan_pp' => $request->nama_golongan_atasan_pp,
                    'nama_pangkat_atasan_pp' => $request->nama_pangkat_atasan_pp,
                    'instansi_kerja_atasan_pp' => $request->instansi_kerja_atasan_pp
                ];

        $hapus = T_dp3_pegawai::findOrFail($id_dp3);
        Storage::disk('local')->delete($hapus->path_sk_kenaikan_pangkat);

        if ($path_dp3) {

            $hapus = T_dp3_pegawai::findOrFail($id_dp3);
            Storage::disk('local')->delete($hapus->path_sk_kenaikan_pangkat);

            $nama_file_path_dp3 = 'DP3 '.$request->tahun_penilaian.'.'.$path_dp3->getClientOriginalExtension();
            $file_dp3 = Storage::putFileAs('public/'.$paths, $path_dp3, $nama_file_path_dp3);
            $data['nama_file_dp3'] = $nama_file_path_dp3;
            $data['path_dp3'] = $file_dp3;
        }

        $model = T_dp3_pegawai::where('id_dp3', $id_dp3)->firstOrFail();
        $model->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dp3)
    {
        $hapus = T_dp3_pegawai::findOrFail($id_dp3);
        Storage::disk('local')->delete($hapus->path_sk_kenaikan_pangkat);

        T_dp3_pegawai::destroy($id_dp3);
    }

    public function data_dp3_pegawai(Request $request, $id)
    {
        $model =  T_dp3_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_dp3_pegawais.nip')
            ->where('t_dp3_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Dp3 Pegawai",
                    'url_show' => route('dp3.show', $model->id_dp3),
                    'url_edit' => route('dp3.edit', $model->id_dp3),
                    'url_destroy' => route('dp3.destroy', $model->id_dp3)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
