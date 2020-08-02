<?php

namespace App\Exports;

use App\Keluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class KeluarsExport implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Keluar::all();
    }

    public function map($keluar): array
    {
        return [
            $keluar->no_trans,
            $keluar->tgl_keluar,
            $keluar->barang->nm_barang,
            $keluar->satuan->nm_satuan,
            $keluar->jml_barang,
            $keluar->hrg_satuan,
            $keluar->hrg_total,
            $keluar->tujuan->nm_tujuan
        ];
    }
}
