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

    public function edittender($id)
    {
        $tender = Tender::find($id);
        return view('tender.edit_tender', ['tender' => $tender]);
    }

    public function addTender()
    {
        return view('tender.add_tender');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_proyek' => 'required',
            'nama_tender' => 'required',
            'nama_pelanggan' => 'required',
            'batas_waktu' => 'required'
        ]);
        $data = $request->all();
        Tender::create([
            'nama_proyek' => $data['nama_proyek'],
            'nama_tender' => $data['nama_tender'],
            'nama_pelanggan' => $data['nama_pelanggan'],
            'batas_waktu' => $data['batas_waktu']
        ]);

        return redirect('/tender')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function update(Request $request,$id)
    {
        $tender = Tender::find($id);

        $this->validate($request, [
            'nama_proyek' => 'required',
            'nama_tender' => 'required',
            'nama_pelanggan' => 'required',
            'batas_waktu' => 'required'
        ]);
        $data = $request->all();
        $tender->update($request->all());

        return redirect('/tender')->with('sukses', 'Data Berhasil Di Ubah!');
    }

}
