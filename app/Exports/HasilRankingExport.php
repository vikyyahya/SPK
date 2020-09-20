<?php

namespace App\Exports;

use App\Vektor;
use Maatwebsite\Excel\Concerns\FromCollection;

class HasilRankingExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vektor::all();
    }
}
