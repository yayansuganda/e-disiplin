<?php

namespace App\Http\Controllers;

use App\T_jabatan_pegawai;
use App\T_m_skpd;
use App\T_m_skpd_bidang;
use App\T_m_skpd_subbidang;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class T_jabatan_pegawaiController extends Controller
{

    public function index()
    {
        return view('t_views.t_jabatan_pegawai.jabatan');
    }


    public function create_jabatan($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $jenis_jabatan = DB::table("t_m_jenis_jabatans")->pluck('nama_m_jenis_jabatan', 'id_m_jenis_jabatan');
        $nama_subbidang = DB::table("t_m_skpd_subbidangs")->pluck('nama_m_skpd_subbidang', 'id_m_skpd_subbidang');
        $eselon = DB::table("t_m_eselons")->pluck('nama_m_eselon', 'id_m_eselon');

        $model = new T_jabatan_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_jabatan_pegawai.form', compact('eselon','model','model2', 'pegawai', 'jenis_jabatan','nama_subbidang'));
    }

    public function jenis_jabatan($id_m_jenis_jabatan)
    {
        if ($id_m_jenis_jabatan == '2' or $id_m_jenis_jabatan == '3') {
            $nama_jabatan = DB::table("t_m_jabatans")->where('id_m_jenis_jabatan', '=', $id_m_jenis_jabatan)->pluck('nama_m_jabatan', 'nama_m_jabatan');
        } else {
            $nama_jabatan = DB::table("t_m_jabatans")->where('nama_m_jabatan', 'LIKE', '%' . $id_m_jenis_jabatan.'%')->pluck('nama_m_jabatan', 'nama_m_jabatan');

        }

        return response()->json($nama_jabatan);
    }

    public function nama_bidang_skpd($id)
    {
        $bidang_skpd = DB::table("t_m_skpd_bidangs")
                    ->join('t_m_skpd_subbidangs','t_m_skpd_subbidangs.id_m_skpd_bidang','=','t_m_skpd_bidangs.id_m_skpd_bidang')
                    ->where('t_m_skpd_subbidangs.id_m_skpd_subbidang', '=', $id)
                    ->pluck('t_m_skpd_bidangs.nama_m_skpd_bidang', 't_m_skpd_bidangs.id_m_skpd_bidang');

        return response()->json($bidang_skpd);
    }

    public function nama_skpd($id)
    {

        $cek_nama_skpd_1 = T_m_skpd_bidang::leftjoin('t_m_skpds','t_m_skpds.id_m_skpd','=','t_m_skpd_bidangs.id_m_skpd')
        ->where('t_m_skpd_bidangs.nama_m_skpd_bidang', '=', $id)->first();


        $cek_nama_skpd_2 = T_m_skpd_subbidang::leftjoin('t_m_skpd_bidangs','t_m_skpd_bidangs.id_m_skpd_bidang','=','t_m_skpd_subbidangs.id_m_skpd_bidang')
        ->leftjoin('t_m_skpds','t_m_skpds.id_m_skpd','=','t_m_skpd_bidangs.id_m_skpd')
        ->where('t_m_skpd_subbidangs.nama_m_skpd_subbidang', '=', $id)->first();


        $cek_nama_skpd_3 = T_m_skpd::where('nama_m_skpd','=', $id)->first();

        if ($cek_nama_skpd_3 <> null )  {
            $nama_skpd_3 = T_m_skpd::where('nama_m_skpd','=', $id)->pluck('nama_m_skpd','id_m_skpd');
            return response()->json($nama_skpd_3);
        }


        if ($cek_nama_skpd_1 == null) {
            $nama_skpd_2 = T_m_skpd_subbidang::leftjoin('t_m_skpd_bidangs','t_m_skpd_bidangs.id_m_skpd_bidang','=','t_m_skpd_subbidangs.id_m_skpd_bidang')
                        ->leftjoin('t_m_skpds','t_m_skpds.id_m_skpd','=','t_m_skpd_bidangs.id_m_skpd')
                        ->where('t_m_skpd_subbidangs.nama_m_skpd_subbidang', '=', $id)->pluck('t_m_skpds.nama_m_skpd','t_m_skpds.id_m_skpd');

            return response()->json($nama_skpd_2);


        } elseif ($cek_nama_skpd_2 == null) {
            $nama_skpd_1 = T_m_skpd_bidang::leftjoin('t_m_skpds','t_m_skpds.id_m_skpd','=','t_m_skpd_bidangs.id_m_skpd')
                        ->where('t_m_skpd_bidangs.nama_m_skpd_bidang', '=', $id)->pluck('t_m_skpds.nama_m_skpd','t_m_skpds.id_m_skpd');

            return response()->json($nama_skpd_1);

        }


    }


    public function nama_unor($id)
    {
        if ($id == "SKPD") {
            $unor = DB::table("t_m_skpds")->pluck('nama_m_skpd', 'id_m_skpd');
        } elseif ($id == "Bidang") {
            $unor = DB::table("t_m_skpd_bidangs")->pluck('nama_m_skpd_bidang', 'id_m_skpd_bidang');
        } else {
            $unor = DB::table("t_m_skpd_subbidangs")->pluck('nama_m_skpd_subbidang', 'id_m_skpd_subbidang');
        }

        return response()->json($unor);
    }


    public function store(Request $request)
    {


        $path_sk_jabatan = $request->file('path_sk_jabatan');
        $path_sk_pelantikan_jabatan = $request->file('path_sk_pelantikan_jabatan');
        $path_sumpah_jabatan = $request->file('path_sumpah_jabatan');


        if ($request->nama_m_jabatan2 != '') {
            $isi = $request->nama_m_jabatan2;
        } elseif ($request->nama_m_jabatan != '') {
            $isi = $request->nama_m_jabatan;
        }


        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'id_m_jenis_jabatan' => $request->id_m_jenis_jabatan,
                    'nama_m_jabatan' => $isi,
                    'unit_unor' => $request->unit_unor,
                    'nama_m_skpd' => $request->nama_m_skpd,
                    'tmt_jabatan' => $request->tmt_jabatan,
                    'tanggal_sk' => $request->tanggal_sk,
                    'nomor_sk' => $request->nomor_sk ,
                    'tmt_pelantikan' => $request->tmt_pelantikan,
                    'id_eselon' => $request->id_eselon
                ];


        if ($path_sk_jabatan) {
            $nama_file_sk_jabatan = 'SK JABATAN '.$request->tanggal_sk.'.'.$path_sk_jabatan->getClientOriginalExtension();
            $sk_jabatan = Storage::putFileAs('public/'.$paths, $path_sk_jabatan, $nama_file_sk_jabatan);
            $data['nama_file_sk_jabatan'] = $nama_file_sk_jabatan;
            $data['path_sk_jabatan'] = $sk_jabatan;
        }

        if ($path_sk_pelantikan_jabatan) {
            $nama_file_pelantikan_jabatan = 'SK PELANTIKAN JABATAN '.$request->tmt_pelantikan.'.'.$path_sk_pelantikan_jabatan->getClientOriginalExtension();
            $sk_pelantikan = Storage::putFileAs('public/'.$paths, $path_sk_pelantikan_jabatan, $nama_file_pelantikan_jabatan);
            $data['nama_file_sk_pelantikan_jabatan'] = $nama_file_pelantikan_jabatan;
            $data['path_sk_pelantikan_jabatan'] = $sk_pelantikan;
        }

        if ($path_sumpah_jabatan) {
            $nama_file_sumpah_jabatan = 'SUMPAH JABATAN.'.$request->tmt_pelantikan.'.'.$path_sumpah_jabatan->getClientOriginalExtension();
            $sumpah_jabatan = Storage::putFileAs('public/'.$paths, $path_sumpah_jabatan, $nama_file_sumpah_jabatan);
            $data['nama_file_sumpah_jabatan'] = $nama_file_sumpah_jabatan;
            $data['path_sumpah_jabatan'] = $sumpah_jabatan;
        }

        $model = T_jabatan_pegawai::create($data);
        return $model;
    }


    public function show($id)
    {
        $model = T_jabatan_pegawai::join('t_m_jenis_jabatans','t_m_jenis_jabatans.id_m_jenis_jabatan','=','t_jabatan_pegawais.id_m_jenis_jabatan')
        ->where('t_jabatan_pegawais.nip','=',$id)->get();
        return view('t_views.t_jabatan_pegawai.show', compact('model'));
    }


    public function edit($id_jabatan)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $jenis_jabatan = DB::table("t_m_jenis_jabatans")->pluck('nama_m_jenis_jabatan', 'id_m_jenis_jabatan');
        $eselon = DB::table("t_m_eselons")->pluck('nama_m_eselon', 'id_m_eselon');


        $model = T_jabatan_pegawai::join('t_pegawais','t_pegawais.nip','=','t_jabatan_pegawais.nip')
        ->where('t_jabatan_pegawais.id_jabatan', $id_jabatan)->firstOrFail();

        $nama_jabatan = DB::table("t_m_jabatans")->pluck('nama_m_jabatan', 'nama_m_jabatan');

        $cek_nama_skpd_1 = T_m_skpd_bidang::leftjoin('t_m_skpds','t_m_skpds.id_m_skpd','=','t_m_skpd_bidangs.id_m_skpd')
                ->where('t_m_skpd_bidangs.nama_m_skpd_bidang', '=', $model->unit_unor)->first();

        $cek_nama_skpd_2 = T_m_skpd_subbidang::leftjoin('t_m_skpd_bidangs','t_m_skpd_bidangs.id_m_skpd_bidang','=','t_m_skpd_subbidangs.id_m_skpd_bidang')
                ->leftjoin('t_m_skpds','t_m_skpds.id_m_skpd','=','t_m_skpd_bidangs.id_m_skpd')
                ->where('t_m_skpd_subbidangs.nama_m_skpd_subbidang', '=', $model->unit_unor)->first();

        $cek_nama_skpd_3 = T_m_skpd::where('nama_m_skpd','=', $model->unit_unor)->first();

                if ($cek_nama_skpd_3 != null )  {
                    $nama_unor = DB::table("t_m_skpds")->pluck('nama_m_skpd', 'nama_m_skpd');
                }

                if ($cek_nama_skpd_1 == null) {
                    $nama_unor = T_m_skpd_subbidang::leftjoin('t_m_skpd_bidangs','t_m_skpd_bidangs.id_m_skpd_bidang','=','t_m_skpd_subbidangs.id_m_skpd_bidang')
                                ->leftjoin('t_m_skpds','t_m_skpds.id_m_skpd','=','t_m_skpd_bidangs.id_m_skpd')
                                ->pluck('t_m_skpds.nama_m_skpd','t_m_skpds.nama_m_skpd');
                } elseif ($cek_nama_skpd_2 == null) {
                    $nama_unor = T_m_skpd_bidang::leftjoin('t_m_skpds','t_m_skpds.id_m_skpd','=','t_m_skpd_bidangs.id_m_skpd')
                                ->pluck('t_m_skpds.nama_m_skpd','t_m_skpds.nama_m_skpd');
                }







        return view('t_views.t_jabatan_pegawai.form', compact('nama_jabatan','nama_unor','eselon','model', 'pegawai', 'jenis_jabatan'));
    }


    public function update(Request $request, $id_jabatan)
    {
        $path_sk_jabatan = $request->file('path_sk_jabatan');
        $path_sk_pelantikan_jabatan = $request->file('path_sk_pelantikan_jabatan');
        $path_sumpah_jabatan = $request->file('path_sumpah_jabatan');

        if ($request->nama_m_jabatan2 != '') {
            $isi = $request->nama_m_jabatan2;
        } elseif ($request->nama_m_jabatan != '') {
            $isi = $request->nama_m_jabatan;
        }



        $paths = $request->nip;

        $data = [
            'nip' => $paths,
            'id_m_jenis_jabatan' => $request->id_m_jenis_jabatan,
            'nama_m_jabatan' => $isi,
            'unit_unor' => $request->unit_unor,
            'nama_m_skpd' => $request->nama_m_skpd,
            'tmt_jabatan' => $request->tmt_jabatan,
            'tanggal_sk' => $request->tanggal_sk,
            'nomor_sk' => $request->nomor_sk ,
            'tmt_pelantikan' => $request->tmt_pelantikan,
            'id_eselon' => $request->id_eselon
        ];


            $hapus = T_jabatan_pegawai::findOrFail($id_jabatan);
            Storage::disk('local')->delete($hapus->path_sk_jabatan);
            Storage::disk('local')->delete($hapus->path_sk_pelantikan_jabatan);
            Storage::disk('local')->delete($hapus->path_sk_sumpah_jabatan);


            if ($path_sk_jabatan) {
                $nama_file_sk_jabatan = 'SK JABATAN '.$request->tanggal_sk.'.'.$path_sk_jabatan->getClientOriginalExtension();
                $sk_jabatan = Storage::putFileAs('public/'.$paths, $path_sk_jabatan, $nama_file_sk_jabatan);
                $data['nama_file_sk_jabatan'] = $nama_file_sk_jabatan;
                $data['path_sk_jabatan'] = $sk_jabatan;
            }

            if ($path_sk_pelantikan_jabatan) {
                $nama_file_pelantikan_jabatan = 'SK PELANTIKAN JABATAN '.$request->tmt_pelantikan.'.'.$path_sk_pelantikan_jabatan->getClientOriginalExtension();
                $sk_pelantikan = Storage::putFileAs('public/'.$paths, $path_sk_pelantikan_jabatan, $nama_file_pelantikan_jabatan);
                $data['nama_file_sk_pelantikan_jabatan'] = $nama_file_pelantikan_jabatan;
                $data['path_sk_pelantikan_jabatan'] = $sk_pelantikan;
            }

            if ($path_sumpah_jabatan) {
                $nama_file_sumpah_jabatan = 'SUMPAH JABATAN.'.$request->tmt_pelantikan.'.'.$path_sumpah_jabatan->getClientOriginalExtension();
                $sumpah_jabatan = Storage::putFileAs('public/'.$paths, $path_sumpah_jabatan, $nama_file_sumpah_jabatan);
                $data['nama_file_sumpah_jabatan'] = $nama_file_sumpah_jabatan;
                $data['path_sumpah_jabatan'] = $sumpah_jabatan;
            }


        $model = T_jabatan_pegawai::where('id_jabatan', $id_jabatan)->firstOrFail();
        $model->update($data);
    }


    public function destroy($id_jabatan)
    {
        $hapus = T_jabatan_pegawai::findOrFail($id_jabatan);
        Storage::disk('local')->delete($hapus->path_sk_jabatan);
        Storage::disk('local')->delete($hapus->path_sk_pelantikan_jabatan);
        Storage::disk('local')->delete($hapus->path_sk_sumpah_jabatan);


        T_jabatan_pegawai::destroy($id_jabatan);
    }

    public function download_file_sk_jabatan($id) {
        $download = T_jabatan_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_sk_jabatan);
    }

    public function download_file_sk_pelantikan_jabatan($id) {
        $download = T_jabatan_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_sk_pelantikan_jabatan);
    }

    public function download_file_sumpah_jabatan($id) {
        $download = T_jabatan_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_sumpah_jabatan);
    }

    public function data_jabatan_pegawai(Request $request, $id)
    {
        $model =  T_jabatan_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_jabatan_pegawais.nip')
            ->leftjoin('t_m_jenis_jabatans', 't_m_jenis_jabatans.id_m_jenis_jabatan', '=', 't_jabatan_pegawais.id_m_jenis_jabatan')
            ->where('t_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Jabatan Pegawai",
                    'url_show' => route('jabatan.show', $model->id_jabatan),
                    'url_edit' => route('jabatan.edit', $model->id_jabatan),
                    'url_destroy' => route('jabatan.destroy', $model->id_jabatan)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
