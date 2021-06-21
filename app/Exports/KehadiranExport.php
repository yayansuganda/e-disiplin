<?php

namespace App\Exports;

use App\T_kehadiran_pegawai;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class KehadiranExport extends DefaultValueBinder implements FromView, WithColumnFormatting, WithEvents, WithCustomValueBinder
{

    public function __construct(string $tahun, string $nip )
    {
        $this->tahun = $tahun;
        $this->nip = $nip;

    }


    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }


    public function registerEvents(): array
    {
        return [

            BeforeSheet::class => function(BeforeSheet $event) {
                $event->sheet->setCellValue('A1','DAFTAR KEHADIRAN PEGAWAI');
                $event->sheet->setCellValue('A2','LINGKUNGAN PEMERINTAH KABUPATEN SUMBAWA BARAT');

                $event->sheet->getStyle('A1:A2')->getAlignment()->applyFromArray(
                    array('horizontal' => 'center',
                          'vertical' => 'center')
                );
                $event->sheet->mergeCells('A1:K1');
                $event->sheet->mergeCells('A2:K2');


            },


                AfterSheet::class => function(AfterSheet $event) {
                    $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(15) ;
                    $event->sheet->getColumnDimension('B')->setAutoSize(true) ;
                    $event->sheet->getColumnDimension('C')->setAutoSize(true) ;
                    $event->sheet->getColumnDimension('E')->setAutoSize(true) ;
                    $event->sheet->getColumnDimension('F')->setAutoSize(true) ;
                    $event->sheet->getColumnDimension('G')->setAutoSize(true) ;
                    $event->sheet->getColumnDimension('H')->setAutoSize(true) ;
                    $event->sheet->getColumnDimension('I')->setAutoSize(true) ;
                    $event->sheet->getColumnDimension('J')->setAutoSize(true) ;
                    $event->sheet->getColumnDimension('K')->setAutoSize(true) ;


                    $event->sheet->getStyle('A8:K8')->getAlignment()->applyFromArray(
                        array('horizontal' => 'center',
                              'vertical' => 'center') //left,right,center & vertical
                        );

                        $event->sheet->getDelegate()->getStyle(
                            'A8:'.$event->sheet->getDelegate()->getHighestColumn().'8')
                             ->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('8aff66');

                        //ini untuk warna background
                        $event->sheet->getDelegate()->getStyle(
                            'A8:'.$event->sheet->getDelegate()->getHighestColumn().'8')
                            ->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('8aff66');

                    $event->sheet->getDelegate()->getRowDimension(8)->setRowHeight(30);
                    $event->sheet->getDelegate()->getStyle('A8:K8')->getAlignment()->setWrapText(true);


                    $event->sheet->getStyle(
                        'A8:' .
                        $event->sheet->getHighestColumn().
                        ($event->sheet->getHighestRow() - 5)
                    )->getBorders()->getAllBorders()->setBorderStyle('thin');

                    //$event->sheet->getStyle('C1:E' . $event->sheet->getHighestRow())
                    //->getAlignment()->setWrapText(true);
                },
            ];
        }


    public function view(): View
    {
        $daftar_kehadiran = T_kehadiran_pegawai::select('t_kehadiran_pegawais.*','t_pegawais.nama_pegawai')
                        ->join('t_pegawais','t_pegawais.nip','=','t_kehadiran_pegawais.nip')
                        ->where('t_kehadiran_pegawais.tahun','=',$this->tahun)
                        ->where('t_kehadiran_pegawais.nip','=',$this->nip)
                        ->get();


        return view('t_views.laporan_excel.kehadiran', compact('daftar_kehadiran'));
    }


    public function columnFormats(): array
    {
        return [
            "A" => "@",
        ];
    }


}
