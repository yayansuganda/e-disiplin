<?php

namespace App\Imports;

use App\T_kehadiran_pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KehadiranImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct(string $tahun, string $bulan )
    {
        $this->tahun = $tahun;
        $this->bulan = $bulan;

    }

    public function startRow(): int
    {
        return 15;
    }

    public function model(array $row)
    {

        if(!empty($row[1])){
            //if (strlen($row[1])-1 == 18) {
                return new T_kehadiran_pegawai([
                    'nip'   => str_replace(' ', '', $row[1]),
                    'tahun' => $this->tahun,
                    'bulan' => $this->bulan,
                    'hari_aktif'=> $row[3],
                    'hadir' => $row[11],
                    'i' => $row[12],
                    'c' => $row[13],
                    's' => $row[14],
                    'dl' => $row[15],
                    'dik_tb' => $row[16],
                    'tl' => $row[17],
                    'ttw' => $row[18],
                    'tk' => $row[19],

                ]);
            //}

    }}
}
