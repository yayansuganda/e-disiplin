<?php

namespace App\Http\Controllers;

use App\Imports\KehadiranImport;
use App\T_jabatan_pegawai;
use App\T_kehadiran_pegawai;
use App\T_sk_hd_pegawai;
use App\T_usulan_kenaikan_pangkat;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function generate_daftar_nominatif($id)
    {

        //GET DATA BERDASARKAN ID

        $daftar_nominatif = T_usulan_kenaikan_pangkat::join('t_pegawais','t_pegawais.nip','=','t_usulan_kenaikan_pangkats.nip')
        ->where('t_usulan_kenaikan_pangkats.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->where('t_usulan_kenaikan_pangkats.status_berkas','=','Usulan')
        ->get();

        $nama_skpds = DB::table('t_m_skpds')->where('id_m_skpd','=',auth()->user()->id_m_skpd)->get();



        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('t_views.laporan_pdf.nominatif_kp', compact('daftar_nominatif','nama_skpds'))->setPaper('legal', 'landscape');
        return $pdf->stream();
    }


    public function generate_duk()
    {

        //GET DATA BERDASARKAN ID


        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4

        $sk_hd = T_sk_hd_pegawai::join('t_pegawais','t_pegawais.nip','=','t_sk_hd_pegawais.nip_pelanggar')->limit(1)->firstOrFail();

        $pdf = PDF::loadView('t_views.laporan_pdf.duk', compact('sk_hd'))->setPaper('legal', 'potrait');
        return $pdf->stream();
    }



    public function form_import()
    {
        $model = new T_kehadiran_pegawai();


        return view('import_file.form_import', compact('model'));
    }

    public function import(Request $request)
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Excel::import(new KehadiranImport($request->tahun, $request->bulan),request()->file('file'));
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        return back();
    }

}
