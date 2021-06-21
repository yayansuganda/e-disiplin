<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\T_pegawai;
use App\T_prajabatan_cpns_pns;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class T_pegawaiController extends Controller
{

    public function index()
    {
        //$provinsi = DB::table("provinsis")->pluck('nama_provinsi', 'id');

        return view('t_views.t_pegawai.pegawai');
    }


    public function index_hd()
    {
        //$provinsi = DB::table("provinsis")->pluck('nama_provinsi', 'id');

        return view('t_views.t_pegawai.pegawai2');
    }

    public function kabupaten($id)
    {
        $kabupaten = DB::table("kabupatens")->where('id_provinsi', '=', $id)->pluck('nama_kabupaten', 'id_kabupaten');
        return response()->json($kabupaten);
    }

    public function kecamatan($id)
    {
        $kecamatan = DB::table("kecamatans")->where('id_kabupaten', '=', $id)->pluck('nama_kecamatan', 'id_kecamatan');
        return response()->json($kecamatan);
    }

    public function kelurahan($id)
    {
        $kelurahan = DB::table("kelurahans")->where('id_kecamatan', '=', $id)->pluck('nama_kelurahan', 'id_kelurahan');
        return response()->json($kelurahan);
    }


    public function create()
    {
        $tempat_lahir_pegawai = DB::table("t_m_kabupatens")->pluck('nama_kabupaten', 'nama_kabupaten');

        $agama_pegawai = DB::table("t_m_agamas")->pluck('nama_m_agama', 'id_m_agama');
        $pernikahan = DB::table("t_m_pernikahans")->pluck('nama_m_pernikahan', 'id_m_pernikahan');

        $model = new T_pegawai();
        return view('t_views.t_pegawai.form', compact('model', 'tempat_lahir_pegawai','agama_pegawai','pernikahan'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255',
            'nama_pegawai' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'id_m_agama' => 'required',
            'id_m_pernikahan' => 'required',
            'nomor_ktp' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
            'email_pegawai' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_npwp' => 'required|string|max:255',
            'nomor_bpjs' => 'required|string|max:255'
        ]);

        $path_surat_nikah = $request->file('path_surat_nikah');
        $path_ktp = $request->file('path_ktp');
        $path_bpjs = $request->file('path_bpjs');
        $path_npwp = $request->file('path_npwp');


        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'nip_lama' => $request->nip_lama,
                    'nama_pegawai' => $request->nama_pegawai,
                    'gelar_depan' => $request->gelar_depan,
                    'gelar_belakang' => $request->gelar_belakang,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'id_m_agama' => $request->id_m_agama,
                    'id_m_pernikahan' => $request->id_m_pernikahan,
                    'nomor_ktp' => $request->nomor_ktp,
                    'nomor_hp' => $request->nomor_hp,
                    'email_pegawai' => $request->email_pegawai,
                    'alamat' => $request->alamat,
                    'nomor_npwp' => $request->nomor_npwp,
                    'nomor_bpjs' => $request->nomor_bpjs
                ];

        if ($path_surat_nikah) {
            $nama_file_surat_nikah = 'SURAT NIKAH.'.$path_surat_nikah->getClientOriginalExtension();
            $file_surat_nikah = Storage::putFileAs('public/'.$paths, $path_surat_nikah, $nama_file_surat_nikah);
            $data['nama_file_surat_nikah'] = $nama_file_surat_nikah;
            $data['path_surat_nikah'] = $file_surat_nikah;
        }

        if ($path_ktp) {
            $nama_file_ktp = 'KTP.'.$path_ktp->getClientOriginalExtension();
            $file_ktp = Storage::putFileAs('public/'.$paths, $path_ktp, $nama_file_ktp);
            $data['nama_file_ktp'] = $nama_file_ktp;
            $data['path_ktp'] = $file_ktp;
        }

        if ($path_bpjs) {
            $nama_file_bpjs = 'BPJS.'.$path_bpjs->getClientOriginalExtension();
            $file_bpjs = Storage::putFileAs('public/'.$paths, $path_bpjs, $nama_file_bpjs);
            $data['nama_file_bpjs'] = $nama_file_bpjs;
            $data['path_bpjs'] = $file_bpjs;
        }

        if ($path_npwp) {
            $nama_file_npwp = 'NPWP.'.$path_npwp->getClientOriginalExtension();
            $file_npwp = Storage::putFileAs('public/'.$paths, $path_npwp, $nama_file_npwp);
            $data['nama_file_npwp'] = $nama_file_npwp;
            $data['path_npwp'] = $file_npwp;
        }

        $model = T_pegawai::create($data);
        return $model;
    }


    public function show($id)
    {
        $model = T_pegawai::join('t_jabatan_pegawais', 't_jabatan_pegawais.nip', '=', 't_pegawais.nip')
                            ->join(DB::raw('(SELECT MAX(nama_m_jabatan)  AS nama_m_jabatan FROM t_jabatan_pegawais  GROUP BY nip)b'), function($join) {
                                $join->on('t_jabatan_pegawais.nama_m_jabatan','=','b.nama_m_jabatan');})
                            ->join('t_golongan_pegawais','t_golongan_pegawais.nip','=','t_pegawais.nip')
                            ->join('t_m_pangkat_golongans','t_m_pangkat_golongans.id_m_pangkat_golongan','=','t_golongan_pegawais.id_m_pangkat_golongan')
                            ->join(DB::raw('(SELECT MAX(id_golongan_pegawai)  AS id_golongan_pegawai FROM t_golongan_pegawais  GROUP BY nip)c'), function($join) {
                                $join->on('t_golongan_pegawais.id_golongan_pegawai','=','c.id_golongan_pegawai');})
                            ->where('t_pegawais.nip','=',$id)
                            ->firstOrFail();

        $files = Storage::allFiles('public/'.$id);

        return view('t_views.t_pegawai.show', compact('model','files'));
    }



    public function show_profil($id)
    {
        $profil_pegawai = T_pegawai::select('t_pegawais.*','t_m_agamas.nama_m_agama','t_m_pernikahans.nama_m_pernikahan')
                                    ->join('t_m_agamas', 't_m_agamas.id_m_agama', '=', 't_pegawais.id_m_agama')
                                    ->join('t_m_pernikahans', 't_m_pernikahans.id_m_pernikahan', '=', 't_pegawais.id_m_pernikahan')
                                    ->where('t_pegawais.nip','=',$id)
                                    ->get();

        $prajabatan_cpns_pns = T_prajabatan_cpns_pns::join('t_pegawais', 't_pegawais.nip', '=', 't_prajabatan_cpns_pns.nip')
            ->join('t_m_status_kepegawaians','t_m_status_kepegawaians.id_m_status_kepegawaian','=','t_prajabatan_cpns_pns.id_m_status_kepegawaian')
            ->where('t_prajabatan_cpns_pns.nip', '=', $id)->get();

        return json_encode(array(
            "profil_pegawai" => $profil_pegawai,
            "prajabatan_cpns_pns" => $prajabatan_cpns_pns
        ));
    }



    public function data_pegawai_asn($id)
    {
        $data_pegawai = T_pegawai::join('t_m_agamas', 't_m_agamas.id_m_agama', '=', 't_pegawais.id_m_agama')
            ->join('t_m_pernikahans', 't_m_pernikahans.id_m_pernikahan', '=', 't_pegawais.id_m_pernikahan')
            ->where('nip', '=', $id)->get();

        return json_encode(array(
            "data_pegawai" => $data_pegawai
        ));
    }


    public function edit($nip)
    {
        $tempat_lahir_pegawai = DB::table("t_m_kabupatens")->pluck('nama_kabupaten', 'nama_kabupaten');
        $agama_pegawai = DB::table("t_m_agamas")->pluck('nama_m_agama', 'id_m_agama');
        $pernikahan = DB::table("t_m_pernikahans")->pluck('nama_m_pernikahan', 'id_m_pernikahan');

        $model = T_pegawai::where('nip', $nip)->firstOrFail();

        return view('t_views.t_pegawai.form', compact('agama_pegawai','pernikahan','tempat_lahir_pegawai', 'model'));
    }


    public function update(Request $request, $nip)
    {
        $path_surat_nikah = $request->file('path_surat_nikah');
        $path_ktp = $request->file('path_ktp');
        $path_bpjs = $request->file('path_bpjs');
        $path_npwp = $request->file('path_npwp');


        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'nip_lama' => $request->nip_lama,
                    'nama_pegawai' => $request->nama_pegawai,
                    'gelar_depan' => $request->gelar_depan,
                    'gelar_belakang' => $request->gelar_belakang,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'id_m_agama' => $request->id_m_agama,
                    'id_m_pernikahan' => $request->id_m_pernikahan,
                    'nomor_ktp' => $request->nomor_ktp,
                    'nomor_hp' => $request->nomor_hp,
                    'email_pegawai' => $request->email_pegawai,
                    'alamat' => $request->alamat,
                    'nomor_npwp' => $request->nomor_npwp,
                    'nomor_bpjs' => $request->nomor_bpjs
                ];

            $hapus_file_surat_nikah = T_pegawai::findOrFail($nip);
            Storage::disk('local')->delete($hapus_file_surat_nikah->path_surat_nikah);

            $hapus_ktp = T_pegawai::findOrFail($nip);
            Storage::disk('local')->delete($hapus_ktp->path_ktp);

            $hapus_bpjs = T_pegawai::findOrFail($nip);
            Storage::disk('local')->delete($hapus_bpjs->path_bpjs);

            $hapus_npwp = T_pegawai::findOrFail($nip);
            Storage::disk('local')->delete($hapus_npwp->path_npwp);

        if ($path_surat_nikah) {
            $nama_file_surat_nikah = 'SURAT NIKAH.'.$path_surat_nikah->getClientOriginalExtension();
            $file_surat_nikah = Storage::putFileAs('public/'.$paths, $path_surat_nikah, $nama_file_surat_nikah);
            $data['nama_file_surat_nikah'] = $nama_file_surat_nikah;
            $data['path_surat_nikah'] = $file_surat_nikah;
        }

        if ($path_ktp) {
            $nama_file_ktp = 'KTP.'.$path_ktp->getClientOriginalExtension();
            $file_ktp = Storage::putFileAs('public/'.$paths, $path_ktp, $nama_file_ktp);
            $data['nama_file_ktp'] = $nama_file_ktp;
            $data['path_ktp'] = $file_ktp;
        }

        if ($path_bpjs) {
            $nama_file_bpjs = 'BPJS.'.$path_bpjs->getClientOriginalExtension();
            $file_bpjs = Storage::putFileAs('public/'.$paths, $path_bpjs, $nama_file_bpjs);
            $data['nama_file_bpjs'] = $nama_file_bpjs;
            $data['path_bpjs'] = $file_bpjs;
        }

        if ($path_npwp) {
            $nama_file_npwp = 'NPWP.'.$path_npwp->getClientOriginalExtension();
            $file_npwp = Storage::putFileAs('public/'.$paths, $path_npwp, $nama_file_npwp);
            $data['nama_file_npwp'] = $nama_file_npwp;
            $data['path_npwp'] = $file_npwp;
        }



        $model = T_pegawai::where('nip', $nip)->firstOrFail();
        $model->update($data);
    }


    public function destroy($nip)
    {
        $hapus_file_surat_nikah = T_pegawai::findOrFail($nip);
        Storage::disk('local')->delete($hapus_file_surat_nikah->path_surat_nikah);

        $hapus_ktp = T_pegawai::findOrFail($nip);
        Storage::disk('local')->delete($hapus_ktp->path_ktp);

        $hapus_bpjs = T_pegawai::findOrFail($nip);
        Storage::disk('local')->delete($hapus_bpjs->path_bpjs);

        $hapus_npwp = T_pegawai::findOrFail($nip);
        Storage::disk('local')->delete($hapus_npwp->path_npwp);

        T_pegawai::destroy($nip);
    }

    public function download_surat_nikah($id) {
        $download = T_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_surat_nikah);
    }

    public function download_ktp($id) {
        $download= T_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_ktp);
    }

    public function download_bpjs($id) {
        $download= T_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_bpjs);
    }

    public function download_npwp($id) {
        $download= T_pegawai::findOrFail($id);
        return Storage::disk('local')->download($download->path_npwp);
    }

    public function data_pegawai(Request $request)
    {
        if (auth()->user()->id_role == 1 ) {
            $model = T_pegawai::leftjoin('t_m_agamas','t_m_agamas.id_m_agama','=','t_pegawais.id_m_agama')
                ->leftjoin('t_m_pernikahans','t_m_pernikahans.id_m_pernikahan','=','t_pegawais.id_m_pernikahan')
                ->get();
        } else {

            $model = T_pegawai::select(DB::raw("COALESCE(*,'')"))
                ->join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
                ->join('t_golongan_pegawais','t_golongan_pegawais.nip','=','t_pegawais.nip')
                ->join('t_m_pangkat_golongans','t_m_pangkat_golongans.id_m_pangkat_golongan','=','t_golongan_pegawais.id_m_pangkat_golongan')
                ->join(DB::raw('(select max(id_m_pangkat_golongan) as id_m_pangkat_golongan from t_golongan_pegawais group by id_m_pangkat_golongan)b'), function($join) {
                    $join->on('t_golongan_pegawais.id_m_pangkat_golongan','=','b.id_m_pangkat_golongan');})
                ->leftjoin(DB::raw('(select max(id_jabatan) as id_jabatan from t_jabatan_pegawais group by id_jabatan)c'), function($join) {
                    $join->on('t_jabatan_pegawais.id_jabatan','=','c.id_jabatan');})
                ->where('t_jabatan_pegawais.nama_m_skpd','=',auth()->user()->skpd->nama_m_skpd)
                ->orderBy('t_pegawais.nama_pegawai', 'desc')
                ->get();

        }

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'model2' => "Data Pegawai",
                    'url_show' => route('pegawai.show', $model->nip),
                    'url_edit' => route('pegawai.edit', $model->nip),
                    'url_destroy' => route('pegawai.destroy', $model->nip)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }




    public function data_pegawai2(Request $request)
    {
        if (auth()->user()->id_role == 1 ) {
            $model = T_pegawai::leftjoin('t_m_agamas','t_m_agamas.id_m_agama','=','t_pegawais.id_m_agama')
                ->leftjoin('t_m_pernikahans','t_m_pernikahans.id_m_pernikahan','=','t_pegawais.id_m_pernikahan')
                ->get();
        } else {

            $model = T_pegawai::select('*')
                ->leftjoin('t_m_agamas','t_m_agamas.id_m_agama','=','t_pegawais.id_m_agama')
                ->leftjoin('t_m_pernikahans','t_m_pernikahans.id_m_pernikahan','=','t_pegawais.id_m_pernikahan')
                ->join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
                ->leftjoin(DB::raw('(select max(id_jabatan) as id_jabatan from t_jabatan_pegawais group by id_jabatan)c'), function($join) {
                    $join->on('t_jabatan_pegawais.id_jabatan','=','c.id_jabatan');})
                ->where('t_jabatan_pegawais.nama_m_skpd','=',auth()->user()->skpd->nama_m_skpd)
                ->orderBy('t_pegawais.nama_pegawai', 'desc')
                ->get();

        }

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action3', [
                    'model' => $model,
                    'model2' => "Data Pegawai",
                    'url_show' => route('create_data.hukuman', $model->nip)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }



}
