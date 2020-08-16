<?php

namespace App\Http\Controllers;
use App\Tender;

use Illuminate\Http\Request;

class TenderController extends Controller
{
    //

    public function tender()
    {
        $tender = Tender::all();
        return view('tender.tender', ['tender' => $tender]);
    }

    public function addTender(){
        return view('tender.add_tender');

    }
}
