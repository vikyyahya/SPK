<?php

namespace App\Exports;

use App\Vektor;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Auth;

class PerangkinganReport implements FromView
{
    use Exportable;
    public $data;

    public function __construct($data = "")
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('report.perangkingan', [
            'vektor' => $this->data
        ]);
    }
}
