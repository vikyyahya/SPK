<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SuplierController extends Controller
{
    //
    public function suplier()
    {
        $users = User::where('level', '2')->get();
        return view('suplier.suplier', ['users' => $users]);
    }
}
