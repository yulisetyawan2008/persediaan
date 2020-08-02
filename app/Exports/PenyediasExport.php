<?php

namespace App\Exports;

use App\Penyedia;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenyediasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penyedia::all();
    }
}
