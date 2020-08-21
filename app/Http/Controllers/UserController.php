<?php

namespace App\Http\Controllers;
use App\User;
use App\Level;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function user()
    {
        $users = User::all();
        return view('user.user', ['users' => $users]);
    }

    public function add_user()
    {
        $users = User::all();
        $level = Level::pluck('nama_level', 'id');

        return view('user.addUser', ['users' => $users,'level' => $level]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable',
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

    public function editUser($id){
        $level = Level::pluck('nama_level', 'id');

        $user = User::find($id);

        return view('user.editUser',['user' => $user,'level' => $level]);

    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete($user);
        return redirect('/users')->with('sukses', 'Data berhasil dihapus!');
    }
    
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $level = Level::pluck('nama_level', 'id');
        if ($request->password != $request->syncpassword){
            return view('user.editUser',['user' => $user,'level' => $level])->with('error', 'Password tidak sama');
        }
        else if ($request->password == '') {
            $user->update($request->except('password'));
        } else {
            $user->update($request->all());
        }
        return redirect('/users')->with('sukses', 'Data Berhasil Di Update!');
    }

}
