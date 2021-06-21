<?php

namespace App\Http\Controllers;

use App\T_prajabatan_cpns_pns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class T_prajabatan_cpns_pnsController extends Controller
{

    public function index()
    {
        return view('t_views.t_prajabatan_cpns_pns.prajabatan_cpns_pns');
    }



    public function create_prajabatan($nip)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $status_kepegawaian = DB::table("t_m_status_kepegawaians")->pluck('nama_m_status_kepegawaian', 'id_m_status_kepegawaian');


        $model = new T_prajabatan_cpns_pns();
        $model2 = T_prajabatan_cpns_pns::where('nip', $nip)->firstOrFail();

        return view('t_views.t_prajabatan_cpns_pns.form', compact('model','model2', 'pegawai', 'status_kepegawaian'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255',
            'id_m_status_kepegawaian' => 'required'

        ]);

        $path_cpns = $request->file('path_sk_cpns');
        $path_pns = $request->file('path_sk_pns');
        $path_karsu_karis = $request->file('path_karsu_karis');
        $path_karpeg = $request->file('path_karpeg');
        $path_sttpl = $request->file('path_sttpl');
        $path_taspen = $request->file('path_taspen');

        $paths = $request->nip;

        $data = [
            'nip' => $paths,
            'id_m_status_kepegawaian' => $request->id_m_status_kepegawaian,
            'tmt_cpns' => $request->tmt_cpns,
            'nomor_sk_cpns' => $request->nomor_sk_cpns,
            'tanggal_sk_cpns' => $request->tanggal_sk_cpns,
            'tmt_pns' => $request->tmt_pns,
            'nomor_sk_pns' => $request->nomor_sk_pns,
            'tanggal_sk_pns' => $request->tanggal_sk_pns,
            'karis_karsu' => $request->karis_karsu,
            'karpeg' => $request->karpeg,
            'nomor_sttpl' => $request->nomor_sttpl,
            'tanggal_sttpl' =>$request->tanggal_sttpl,
            'taspen' => $request->taspen,
        ];


        if ($path_cpns) {
            $nama_file_cpns = 'SK CPNS.'.$path_cpns->getClientOriginalExtension();
            $file_cpns = Storage::putFileAs('public/'.$paths, $path_cpns, $nama_file_cpns);
            $data['nama_file_sk_cpns'] = $nama_file_cpns;
            $data['path_sk_cpns'] = $file_cpns;
        }

        if ($path_pns) {
            $nama_file_pns = 'SK PNS.'.$path_pns->getClientOriginalExtension();
            $file_pns = Storage::putFileAs('public/'.$paths, $path_pns, $nama_file_pns);
            $data['nama_file_sk_pns'] = $nama_file_pns;
            $data['path_sk_pns'] = $file_pns;
        }

        if ($path_karsu_karis) {
            $nama_file_karsu_karis = 'KARSU_KARIS.'.$path_karsu_karis->getClientOriginalExtension();
            $file_karsu_karis = Storage::putFileAs('public/'.$paths, $path_karsu_karis, $nama_file_karsu_karis);
            $data['path_karsu_karis'] = $file_karsu_karis;
            $data['nama_file_karsu_karis'] =  $nama_file_karsu_karis;
        }

        if ($path_karpeg) {
            $nama_file_karpeg = 'KARPEG.'.$path_karpeg->getClientOriginalExtension();
            $file_karpeg = Storage::putFileAs('public/'.$paths, $path_karpeg, $nama_file_karpeg);
            $data['path_karpeg'] = $file_karpeg;
            $data['nama_file_karpeg'] = $nama_file_karpeg;
        }

        if ($path_sttpl) {
             $nama_file_sttpl = 'STTPL.'.$path_sttpl->getClientOriginalExtension();
             $file_sttpl = Storage::putFileAs('public/'.$paths, $path_sttpl, $nama_file_sttpl);
             $data['path_sttpl'] = $file_sttpl;
             $data['nama_file_sttpl'] = $nama_file_sttpl;
        }

        if ($path_taspen) {
            $nama_file_taspen = 'TASPEN.'.$path_taspen->getClientOriginalExtension();
            $file_taspen = Storage::putFileAs('public/'.$paths, $path_taspen, $nama_file_taspen);
            $data['path_taspen'] = $file_taspen;
            $data['nama_file_taspen'] = $nama_file_taspen;
        }

        $model = T_prajabatan_cpns_pns::create($data);
        return $model;
    }




    public function edit($id_prajabatan_cpns_pns)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $status_kepegawaian = DB::table("t_m_status_kepegawaians")->pluck('nama_m_status_kepegawaian', 'id_m_status_kepegawaian');

        $model = T_prajabatan_cpns_pns::where('nip', $id_prajabatan_cpns_pns)->firstOrFail();

        return view('t_views.t_prajabatan_cpns_pns.form', compact('model', 'pegawai', 'status_kepegawaian'));
    }


    public function update(Request $request, $nip)
    {

        $path_cpns = $request->file('path_sk_cpns');
        $path_pns = $request->file('path_sk_pns');
        $path_karsu_karis = $request->file('path_karsu_karis');
        $path_karpeg = $request->file('path_karpeg');
        $path_sttpl = $request->file('path_sttpl');
        $path_taspen = $request->file('path_taspen');

        $paths = $request->nip;

        $data = [
            'nip' => $paths,
            'id_m_status_kepegawaian' => $request->id_m_status_kepegawaian,
            'tmt_cpns' => $request->tmt_cpns,
            'nomor_sk_cpns' => $request->nomor_sk_cpns,
            'tanggal_sk_cpns' => $request->tanggal_sk_cpns,
            'tmt_pns' => $request->tmt_pns,
            'nomor_sk_pns' => $request->nomor_sk_pns,
            'tanggal_sk_pns' => $request->tanggal_sk_pns,
            'karis_karsu' => $request->karis_karsu,
            'karpeg' => $request->karpeg,
            'nomor_sttpl' => $request->nomor_sttpl,
            'tanggal_sttpl' =>$request->tanggal_sttpl,
            'taspen' => $request->taspen,
        ];

        $hapus = T_prajabatan_cpns_pns::where('nip','=',$nip)->firstOrFail();
        Storage::disk('local')->delete($hapus->path_sk_cpns);
        Storage::disk('local')->delete($hapus->path_sk_pns);
        Storage::disk('local')->delete($hapus->path_karsu_karis);
        Storage::disk('local')->delete($hapus->path_karpeg);
        Storage::disk('local')->delete($hapus->path_sttpl);
        Storage::disk('local')->delete($hapus->path_taspen);


        if ($path_cpns) {
            $nama_file_cpns = 'SK CPNS.'.$path_cpns->getClientOriginalExtension();
            $file_cpns = Storage::putFileAs('public/'.$paths, $path_cpns, $nama_file_cpns);
            $data['nama_file_sk_cpns'] = $nama_file_cpns;
            $data['path_sk_cpns'] = $file_cpns;
        }

        if ($path_pns) {
            $nama_file_pns = 'SK PNS.'.$path_pns->getClientOriginalExtension();
            $file_pns = Storage::putFileAs('public/'.$paths, $path_pns, $nama_file_pns);
            $data['nama_file_sk_pns'] = $nama_file_pns;
            $data['path_sk_pns'] = $file_pns;
        }

        if ($path_karsu_karis) {
            $nama_file_karsu_karis = 'KARSU_KARIS.'.$path_karsu_karis->getClientOriginalExtension();
            $file_karsu_karis = Storage::putFileAs('public/'.$paths, $path_karsu_karis, $nama_file_karsu_karis);
            $data['path_karsu_karis'] = $file_karsu_karis;
            $data['nama_file_karsu_karis'] =  $nama_file_karsu_karis;
        }

        if ($path_karpeg) {
            $nama_file_karpeg = 'KARPEG.'.$path_karpeg->getClientOriginalExtension();
            $file_karpeg = Storage::putFileAs('public/'.$paths, $path_karpeg, $nama_file_karpeg);
            $data['path_karpeg'] = $file_karpeg;
            $data['nama_file_karpeg'] = $nama_file_karpeg;
        }

        if ($path_sttpl) {
             $nama_file_sttpl = 'STTPL.'.$path_sttpl->getClientOriginalExtension();
             $file_sttpl = Storage::putFileAs('public/'.$paths, $path_sttpl, $nama_file_sttpl);
             $data['path_sttpl'] = $file_sttpl;
             $data['nama_file_sttpl'] = $nama_file_sttpl;
        }

        if ($path_taspen) {
            $nama_file_taspen = 'TASPEN.'.$path_taspen->getClientOriginalExtension();
            $file_taspen = Storage::putFileAs('public/'.$paths, $path_taspen, $nama_file_taspen);
            $data['path_taspen'] = $file_taspen;
            $data['nama_file_taspen'] = $nama_file_taspen;
       }


         T_prajabatan_cpns_pns::where('nip','=', $paths)->update($data);


    }


    public function destroy($id_prajabatan_cpns_pns)
    {
        T_prajabatan_cpns_pns::destroy($id_prajabatan_cpns_pns);
    }


    public function download_file_sk_cpns($id) {
        $download = T_prajabatan_cpns_pns::where('nip','=',$id)->firstOrFail();
        return Storage::disk('local')->download($download->path_sk_cpns);
    }


    public function download_file_sk_pns($id) {
        $download = T_prajabatan_cpns_pns::where('nip','=',$id)->firstOrFail();
        return Storage::disk('local')->download($download->path_sk_pns);
    }


    public function download_file_karsu_karis($id) {
        $download = T_prajabatan_cpns_pns::where('nip','=',$id)->firstOrFail();
        return Storage::disk('local')->download($download->path_karsu_karis);
    }

    public function download_file_karpeg($id) {
        $download = T_prajabatan_cpns_pns::where('nip','=',$id)->firstOrFail();
        return Storage::disk('local')->download($download->path_karpeg);
    }

    public function download_file_sttpl($id) {
        $download = T_prajabatan_cpns_pns::where('nip','=',$id)->firstOrFail();
        return Storage::disk('local')->download($download->path_sttpl);
    }

    public function download_file_taspen($id) {
        $download = T_prajabatan_cpns_pns::where('nip','=',$id)->firstOrFail();
        return Storage::disk('local')->download($download->path_taspen);
    }

    public function data_prajabatan_cpns_pns(Request $request, $id)
    {
        $model =  T_prajabatan_cpns_pns::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_prajabatan_cpns_pns.nip')
            ->join('t_m_status_kepegawaians', 't_m_status_kepegawaians.id_m_status_kepegawaian', '=', 't_prajabatan_cpns_pns.id_m_status_kepegawaian')
            ->where('t_prajabatan_cpns_pns.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Prajabatan CPNS/PNS",
                    'url_show' => route('prajabatan_cpns_pns.show', $model->id_t_prajabatan_cpns_pns),
                    'url_edit' => route('prajabatan_cpns_pns.edit', $model->id_t_prajabatan_cpns_pns),
                    'url_destroy' => route('prajabatan_cpns_pns.destroy', $model->id_t_prajabatan_cpns_pns)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
