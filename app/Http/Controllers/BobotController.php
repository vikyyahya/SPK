<?php

namespace App\Http\Controllers;

use App\Tender;
use App\Kriteria;
use App\Bobot;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class BobotController extends Controller
{
    //
    public function index()
    {
        $bobot = Bobot::paginate(5);

        return view('bobot.bobot', ['bobot' => $bobot]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $bobot = Bobot::with('tender')->with('kriterias')
            ->wherehas('tender', function ($q)  use ($cari) {
                $q->where('nama_tender', 'like', "%" . $cari . "%");
            })->orwherehas('kriterias', function ($q)  use ($cari) {
                $q->where('deskripsi', 'like', "%" . $cari . "%");
            })->paginate(5);

        return view('bobot.bobot', ['bobot' => $bobot]);
    }

    public function edit($id)
    {
        $bobot = Bobot::find($id);
        $tender = Tender::pluck('nama_proyek', 'id');
        $kriteria = Kriteria::pluck('kriteria', 'id');
        $kategories = collect([
            ['id' => '1', 'name' => 'Benefit'],
            ['id' => '2', 'name' => 'Cost'],
        ]);

        $nilais = collect([
            ['id' => '1', 'name' => '1'],
            ['id' => '2', 'name' => '2'],
            ['id' => '3', 'name' => '3'],
            ['id' => '4', 'name' => '4'],
        ]);
        $kategori = $kategories->pluck('name', 'name');
        $nilai = $nilais->pluck('name', 'name');

        return view('bobot.editBobot', ['bobot' => $bobot, 'kategori' => $kategori, 'kriteria' => $kriteria, 'tender' => $tender, 'nilai' => $nilai]);
    }

    public function addBobot()
    {
        $tender = Tender::pluck('nama_tender', 'id');
        $kriteria = Kriteria::pluck('kriteria', 'id');
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
        $nilais = collect([
            ['id' => '1', 'name' => '1'],
            ['id' => '2', 'name' => '2'],
            ['id' => '3', 'name' => '3'],
            ['id' => '4', 'name' => '4'],
        ]);

        $kategori = $kategories->pluck('name', 'name');
        $nilai = $nilais->pluck('name', 'name');
        $deskripsi = $deskripsies->pluck('name', 'name');
        return view('bobot.addBobot', ['kategori' => $kategori, 'kriteria' => $kriteria, 'tender' => $tender], ['nilai' => $nilai]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tender' => 'required',
            'id_kriteria' => 'required',
            'nilai' => 'required',
            'kategori' => 'required',
        ]);
        $kriteria = Kriteria::find($request->id_kriteria);
        $bobot = Bobot::where([['id_tender', '=', $request->tender], ['id_kriteria', '=', $request->id_kriteria]])->get();

        // return count($bobot);
        // if (count($bobot) != 0) {
        //     // return Redirect::back()->withErrors();
        //     return back()->withErrors(['message' => 'Kriteria sudah di gunakan']);
        // }
        $bobot = Bobot::find($id);
        $tender = Tender::pluck('nama_proyek', 'id');

        // return $bobot;
        $bobot->update($request->all());

        return redirect('/bobot')->with('sukses', 'Data berhasil diupdate!');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'tender' => 'required',
            'id_kriteria' => 'required',
            'nilai' => 'required',
            'kategori' => 'required',
        ]);
        $kriteria = Kriteria::find($request->id_kriteria);
        //cek bobot
        $bobot = Bobot::where([['id_tender', '=', $request->tender], ['id_kriteria', '=', $request->id_kriteria]])->get();
        // return count($bobot) ;
        if (count($bobot) != 0) {
            // return Redirect::back()->withErrors();
            return back()->withErrors(['message' => 'Kriteria sudah di gunakan']);
        }

        $data = $request->all();
        Bobot::create([
            'id_kriteria' => $data['id_kriteria'],
            'kategori' =>  $data['kategori'],
            'deskripsi' =>  $kriteria->kriteria,
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
    public function export_pdf()
    {
        $users = Bobot::all();
        $pdf = PDF::loadview('report.reportbobot', ['bobot' => $users]);
        $pdf->save(storage_path() . '/uniquename.pdf');
        return $pdf->stream();
    }
}
