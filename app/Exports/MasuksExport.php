<?php

namespace App\Exports;

use App\Masuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class MasuksExport implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Masuk::all();
    }

    public function map($masuk): array
    {
        return [
            $masuk->no_transaksi,
            $masuk->tgl_transaksi,
            $masuk->barang->nm_barang,
            $masuk->satuan->nm_satuan,
            $masuk->jml_barang,
            $masuk->hrg_satuan,
            $masuk->hrg_total,
            $masuk->penyedia->nm_penyedia
        ];
    }


}
