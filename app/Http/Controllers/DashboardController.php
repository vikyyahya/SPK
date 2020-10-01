<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Level;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        // return $users->link;
        return view('user.user', ['users' => $users]);
    }
}
