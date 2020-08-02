<?php

namespace App\Exports;

use App\Satuan;
use Maatwebsite\Excel\Concerns\FromCollection;

class SatuansExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Satuan::all();
    }
}
