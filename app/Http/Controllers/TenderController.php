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

    public function addTender()
    {
        return view('tender.add_tender');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable',
            'email' => 'unique:users,email',
            'password' => ['required', 'string', 'min:8'],
            'level' => 'nullable'
        ]);
        return view('tender.tender');
    }
}
