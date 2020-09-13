<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SuplierController extends Controller
{
    //
    public function suplier()
    {
        $users = User::where('level', '2')->paginate(5);
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
}
