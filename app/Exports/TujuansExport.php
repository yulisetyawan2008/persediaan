<?php

namespace App\Exports;

use App\Tujuan;
use Maatwebsite\Excel\Concerns\FromCollection;

class TujuansExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tujuan::all();
    }
}
