<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;


class SuplierController extends Controller
{
    //
    public function suplier()
    {
        $users = User::where('level', '2')->paginate(5);
        return view('suplier.suplier', ['users' => $users]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $users = User::where('name', 'like', "%" . $cari . "%")
            ->orwhere('email', 'like', "%" . $cari . "%")
            ->paginate(5);
        // return $users->link;
        return view('suplier.suplier', ['users' => $users]);
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('suplier.edit_suplier', ['user' => $users]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect('/suplier')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete($user);
        return redirect('/suplier')->with('sukses', 'Data berhasil dihapus!');
    }

    public function export_excel()
    {
        $users = User::where('level', '2')->get();
        $pdf = PDF::loadview('report.reportsuplier', ['users' => $users]);
        return $pdf->download('laporan-suplier-pdf');

        // return $users;
        // return (new UserReport($users))->download('users.xlsx');
    }
}
