<?php

namespace App\Http\Controllers;

use App\T_nomor_usul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class T_nomor_usulController extends Controller
{

    public function index()
    {
        return view('t_views.t_nomor_usulan.nomor_usulan');
    }


    public function create()
    {
        $usulan_kp = DB::table("t_m_skpds")->pluck('nama_m_skpd', 'id_m_skpd');

        $model = new T_nomor_usul();
        return view('t_views.t_nomor_usulan.form', compact('model','usulan_kp'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor_usulan' => 'required|string|max:255',
            'tanggal_usulan' => 'required|string|max:255',
            'satuan_kerja' => 'required|string|max:255'
        ]);

        $model = T_nomor_usul::create($request->all());
        return $model;
    }


    public function show(Request $request, $id)
    {
        if ($request->segment(2) == 'Usulan Kenaikan Pangkat') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_usulan_kp.daftar_pegawai');
        } else if ($request->segment(2) == 'Usulan Gaji Berkala') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_kgb.usulan_kgb');
        } else if ($request->segment(2) == 'Usulan Jafung') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_jafung.usulan_jafung');
        } else if ($request->segment(2) == 'Usulan Pensiun') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_pensiun.usulan_pensiun');
        }  else if ($request->segment(2) == 'Usulan Mutasi') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_mutasi.usulan_mutasi');
        } else if ($request->segment(2) == 'Usulan Ujian Pi') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_ujian_pi.usulan_ujian_pi');
        } else if ($request->segment(2) == 'Usulan Perbaikan Data') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_perbaikan_data.usulan_perbaikan_data');
        } else if ($request->segment(2) == 'Usulan Diklat') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_diklat.usulan_diklat');
        } else if ($request->segment(2) == 'Usulan Ujian Dinas') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_ujian_dinas.usulan_ujian_dinas');
        } else if ($request->segment(2) == 'Usulan Peningkatan Pendidikan') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_peningkatan_pendidikan.usulan_peningkatan_pendidikan');
        } else if ($request->segment(2) == 'Usulan Cuti') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_cuti.usulan_cuti');
        } else if ($request->segment(2) == 'Usulan Karis Karsu') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_karis_karsu.usulan_karis_karsu');
        } else if ($request->segment(2) == 'Usulan Karpeg') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_karpeg.usulan_karpeg');
        } else if ($request->segment(2) == 'Usulan Taspen') {
            return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_taspen.usulan_taspen');
        }

    }


    public function nomor_usulan($id_usulan)
    {
        $model = T_nomor_usul::where('id_usulan', $id_usulan)->firstOrFail();

        return view('t_views.t_usulan_pegawai.form', compact('model'));
    }


    public function edit($id_usulan)
    {
        $model = T_nomor_usul::where('id_usulan', $id_usulan)->firstOrFail();

        return view('t_views.t_nomor_usulan.form2', compact('model'));
    }


    public function update(Request $request, $id_usulan)
    {

        $model = T_nomor_usul::where('id_usulan', $id_usulan)->firstOrFail();
        $model->update($request->all());
    }


    public function destroy($id_usulan)
    {
        T_nomor_usul::destroy($id_usulan);
    }


    public function data_usulan_pegawai(Request $request)
    {
        $kategori_usulan = ucwords(preg_replace('/[^A-Za-z0-9\-\(\) ]/', ' ', $request->segment(2)));

        $model = T_nomor_usul::join('t_m_skpds','t_m_skpds.id_m_skpd','=','t_usulans.satuan_kerja')
                ->where('t_usulans.satuan_kerja','=', auth()->user()->id_m_skpd )
                ->where('t_usulans.kategori_nomor_usulan','=', $kategori_usulan)
                ->get();

                return DataTables::of($model)
                ->addColumn('action2', function ($model) {
                    return view('layouts._action3', [
                        'model' => $model,
                        'url_show' => url('daftar_pegawai/'.$model->kategori_nomor_usulan.'/'.$model->nomor_usulan)
                    ]);
                })
                ->addColumn('action', function ($model) {
                    return view('layouts._action2', [
                        'model' => $model,
                        'model2' => "Data Usulan Pegawai",
                        'url_edit' => route('nomor_usulan.edit', $model->id_usulan),
                        'url_destroy' => route('nomor_usulan.destroy', $model->id_usulan)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action2','action'])
                ->make(true);
    }
}
