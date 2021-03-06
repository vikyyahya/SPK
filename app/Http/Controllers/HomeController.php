<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tender;
use App\Level;
use App\Penawaran;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->where('level', '2');
        $tender = Tender::all();
        $penawaran = Penawaran::all();
        if (Auth::user()->level == 1) {
            return view('dashboard.dashboard', ['users' => count($users), 'tender' => count($tender), 'penawaran' => count($penawaran)]);
        } else {
            return view('dashboard.dashboard2', ['users' => count($users), 'tender' => count($tender), 'penawaran' => count($penawaran)]);
        }
    }
}
