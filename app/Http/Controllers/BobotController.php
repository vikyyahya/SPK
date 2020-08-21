<?php

namespace App\Http\Controllers;
use App\Tender;
use App\Bobot;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    //
    public function index()
    {
        $bobot = Bobot::all();

        return view('bobot.bobot', ['bobot' => $bobot]);
    }

    public function edit($id){
        $bobot = Bobot::find($id);
        $tender = Tender::pluck('nama_proyek', 'id');
        $kategories = collect([
            ['id' => '1', 'name' => 'Benefit'],
            ['id' => '2', 'name' => 'Cost'],
        ]);
        $deskripsies = collect([
            ['id' => '1', 'name' => 'Jangka Waktu Pembayaran'],
            ['id' => '2', 'name' => 'Harga'],
            ['id' => '2', 'name' => 'Kualitas'],
            ['id' => '2', 'name' => 'Status Stok Barang'],
        ]);
        $kategori = $kategories->pluck('name','name');
        $nilai = ["1","2","3","4","5"];
        $deskripsi = $deskripsies->pluck('name','name');

        return view('bobot.editBobot',['bobot' => $bobot, 'kategori'=>$kategori,'deskripsi'=>$deskripsi, 'tender'=> $tender, 'nilai'=>$nilai]);

    }

    public function addBobot()
    {
        $tender = Tender::pluck('nama_proyek', 'id');
        $kategories = collect([
            ['id' => '1', 'name' => 'Benefit'],
            ['id' => '2', 'name' => 'Cost'],
        ]);
        $deskripsies = collect([
            ['id' => '1', 'name' => 'Jangka Waktu Pembayaran'],
            ['id' => '2', 'name' => 'Harga'],
            ['id' => '2', 'name' => 'Kualitas'],
            ['id' => '2', 'name' => 'Status Stok Barang'],
        ]);
        $kategori = $kategories->pluck('name','name');
        $nilai = ["1","2","3","4","5"];
        $deskripsi = $deskripsies->pluck('name','name');
        return view('bobot.addBobot',['kategori'=>$kategori,'deskripsi'=>$deskripsi, 'tender'=> $tender],['nilai'=>$nilai]);

    }

    public function create(Request $request)
    {
        $data = $request->all();

        Bobot::create([
            'deskripsi' => $data['deskripsi'],
            'kategori' =>  "Benefit",
            'nilai' => $data['nilai'],
            'id_tender' => $data['tender']
        ]);
        return redirect('/bobot')->with('sukses', 'Data berhasil simpan!');
    }

    public function delete($id)
    {
        $bobot = Bobot::find($id);
        $bobot->delete($bobot);
        return redirect('/bobot')->with('sukses', 'Data berhasil dihapus!');

    }


}
