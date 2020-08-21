<?php

namespace App\Http\Controllers;

use App\Tender;
use App\Penawaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenawaranHargaController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function penawaranharga()
    {
        if (Auth::check()){
            $user = Auth::user();
        }
        $stocks = collect([
            ['id' => '1', 'name' => 'Stock'],
            ['id' => '2', 'name' => 'Indent'],
        ]);
        $pembayarans = collect([
            ['id' => '1', 'name' => 'cash'],
            ['id' => '2', 'name' => 'tempo 14 hari'],
            ['id' => '2', 'name' => 'tempo 30 hari'],
            ['id' => '2', 'name' => 'tempo 60 hari'],
        ]);
        $tender = Tender::pluck('nama_tender', 'id');
        $stock = $stocks->pluck('name','name');
        $pembayaran = $pembayarans->pluck('name','name');
        return view('penawaran_harga.formpenawaranharga',['tender' => $tender,'user' => $user,'stock' => $stock,'pembayaran' => $pembayaran]);
    }

    public function create(Request $request)
    {
        if (Auth::check()){
            $user = Auth::user();
            $data = $request->all();
            // return $request;
        Penawaran::create([
            'id_user' => $user->id,
            'id_tender' => $data['id_tender'],
            'nama_barang' => $data['nama_barang'],
            'harga' => $data['harga'],
            'stock' => $data['stock'],
            'pembayaran' => $data['pembayaran'],
        ]);
        }

        return redirect('/users');

    }

    public function datapenawaran()
    {
        $penawaran = Penawaran::all();
        return view('user.user', ['penawaran' => $penawaran]);
    }



}
