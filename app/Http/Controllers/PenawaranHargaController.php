<?php

namespace App\Http\Controllers;

use App\Tender;
use App\Penawaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;


class PenawaranHargaController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $p = Penawaran::paginate(5);
        return view('penawaran_harga.penawaran', ['p' => $p]);
    }

    public function penawaranharga()
    {
        if (Auth::check()) {
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
        $kualitases = collect([
            ['id' => '1', 'name' => 'bagus'],
            ['id' => '2', 'name' => 'sedang'],
            ['id' => '3', 'name' => 'rendah'],
        ]);

        $tender = Tender::pluck('nama_tender', 'id');
        $stock = $stocks->pluck('name', 'name');
        $kualitas = $kualitases->pluck('name', 'name');
        $pembayaran = $pembayarans->pluck('name', 'name');
        return view('penawaran_harga.formpenawaranharga', ['kualitas' => $kualitas, 'tender' => $tender, 'user' => $user, 'stock' => $stock, 'pembayaran' => $pembayaran]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            "file" => "required|mimes:pdf|max:10000"
        ]);
        if (Auth::check()) {
            $user = Auth::user();
            $data = $request->all();
            $date_time = date("Y-m-d h:i:s a", time());
            $fileName =  Auth::user()->id . $date_time . '.' . $request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);

            // return $request;
            Penawaran::create([
                'id_user' => $user->id,
                'id_tender' => $data['id_tender'],
                'nama_barang' => $data['nama_barang'],
                'harga' => $data['harga'],
                'stock' => $data['stock'],
                'pembayaran' => $data['pembayaran'],
                'kualitas' => $data['kualitas'],
                'nama_dokumen' => $fileName,
            ]);
        }

        return redirect('/listpenawaranharga');
    }

    public function datapenawaran()
    {
        $penawaran = Penawaran::all();
        return view('user.user', ['penawaran' => $penawaran]);
    }

    public function preview($id)
    {
        $penawaran = Penawaran::find($id);
        $nama_dok =  $penawaran->nama_dokumen;
        return view('penawaran_harga.previewpenawaran', ['penawaran' => $nama_dok]);
    }
    public function export_excel()
    {
        $p = Penawaran::all();
        $pdf = PDF::loadview('report.reportpenawaran', ['p' => $p]);
        return $pdf->download('laporan-penawaran-pdf');
    }
}
