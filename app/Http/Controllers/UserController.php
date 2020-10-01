<?php

namespace App\Http\Controllers;

use App\User;
use App\Level;
use Illuminate\Support\Facades\Hash;
use App\Exports\UserReport;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
    }

    public function user()
    {
        $users = User::paginate(5);
        // return $users->link;
        return view('user.user', ['users' => $users]);
    }


    public function cari(Request $request)
    {
        $errors = new \Illuminate\Support\MessageBag();
        $errors->add('Error', 'Data tidak di temukan');
        $cari = $request->cari;

        $users = User::where('name', 'like', "%" . $cari . "%")->paginate(5);
        $us = User::where('name', 'like', "%" . $cari . "%")->get();
        // return count($us);
        if (count($us) == 0) {
            return redirect()->back()->withErrors($errors);;
        } else {
            return view('user.user', ['users' => $users]);
        }
        // return $users->link;
    }

    public function add_user()
    {
        $users = User::all();
        $level = Level::pluck('nama_level', 'id');

        return view('user.addUser', ['users' => $users, 'level' => $level]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users,email',
            'password' => ['required', 'string', 'min:8'],
            'level' => 'nullable'
        ]);

        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level' => $data['level'],
            'no_telp' => $data['no_telp'],
            'nama_perusahaan' => $data['nama_perusahaan'],
            'alamat_perusahaan' => $data['alamat_perusahaan'],
            'produk' => $data['produk'],
            'npwp' => $data['npwp'],
        ]);
        return redirect('/users')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function editUser($id)
    {
        $level = Level::pluck('nama_level', 'id');

        $user = User::find($id);

        return view('user.editUser', ['user' => $user, 'level' => $level]);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete($user);
        return redirect('/users')->with('sukses', 'Data berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        $errors = new \Illuminate\Support\MessageBag();
        $errors->add('Error', 'Konfirmasi password tidak sama');

        $user = User::find($id);
        $level = Level::pluck('nama_level', 'id');
        if ($request->password != $request->syncpassword) {
            return redirect()->back()->withErrors($errors);;
            return view('user.editUser', ['user' => $user, 'level' => $level])->with('error', 'Password tidak sama');
        } else if ($request->password == '') {
            $user->update($request->except('password'));
        } else {
            $pass =  Hash::make($request->password);
            $user->update($request->except('password'));
            $user->password = $pass;
            $user->save();
        }
        return redirect('/users')->with('sukses', 'Data Berhasil Di Update!');
    }
    public function export_excel()
    {
        $users = User::all();
        $pdf = PDF::loadview('report.reportuser', ['users' => $users]);
        $pdf->save(storage_path() . '/uniquename.pdf');
        return $pdf->stream();

        // return $users;
        // return (new UserReport($users))->download('users.xlsx');
    }
}
