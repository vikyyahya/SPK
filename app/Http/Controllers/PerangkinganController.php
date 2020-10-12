<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Bobot;
use App\Penawaran;
use App\User;
use App\Tender;
use App\Vektor;
use Illuminate\Support\Facades\Auth;
use \stdClass;
use App\Exports\HasilRankingExport;
use App\Exports\PerangkinganReport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;




class PerangkinganController extends Controller
{
    //

    public function perangkingan(Request $request)
    {
        $bobot = Bobot::all();
        $tender = Tender::paginate(5);
        $bobotrata = Bobot::where('id_tender', '1')->get();
        $penawaran = Penawaran::all();
        // cari rata2 
        return view('perangkingan.perangkingan', ['tender' => $tender]);
    }

    public function hitung(Request $request, $id)
    {
        $id = $id; //id tender
        $bobot = Bobot::all();
        $bobotrata = Bobot::where('id_tender', $id)->with(['kriterias'])->get();
        $penawaran = Penawaran::where('id_tender', $id)->get();

        // cari rata2 
        //sum value
        $jmlbobot = Bobot::where('id_tender', $id)->with(['kriterias'])->sum('nilai');
        //cari rata2 kriteria
        $rkriteria = new stdClass();
        foreach ($bobotrata as $bobot) {
            $rata2 = $bobot->kriterias->nilai / $jmlbobot;
            // array_push($rkriteria,[$bobot->deskripsi => $rata2 ]);
            $variable = $bobot->kriterias->kriteria;
            $rkriteria->$variable = $rata2;
        }
        // return print_r($rkriteria);
        //pangkat value
        $vektors = array();
        foreach ($penawaran as  $key => $pen) {
            $jangPembayaran = $pen->pembayaran;
            $stc = $pen->stock;
            $kualitas = $pen->kualitas;
            $vpembayaran = '';
            $vstock = '';
            $vkualitas = '';
            if ($jangPembayaran == 'cash') {
                $vpembayaran = 1;
            } else if ($jangPembayaran == 'tempo 14 hari') {
                $vpembayaran = 2;
            } else if ($jangPembayaran == 'tempo 30 hari') {
                $vpembayaran = 3;
            } else if ($jangPembayaran == 'tempo 60 hari') {
                $vpembayaran = 4;
            }
            if ($stc == 'stock') {
                $vstock = 2;
            } else {
                $vstock = 1;
            }
            if ($kualitas == 'bagus') {
                $vkualitas = 3;
            } else if ($kualitas == 'sedang') {
                $vkualitas = 2;
            } else if ($kualitas == 'rendah') {
                $vkualitas = 1;
            }

            $hasilpembayaran = "";
            $totalVektor = "";
            //vektor s
            array_push($vektors, [
                'id_user' => $pen->id_user,
                'jangka_waktu_pembayaran' => pow($vpembayaran, $rkriteria->{'Jangka Waktu Pembayaran'}),
                'kualitas' => pow($vkualitas, $rkriteria->{'Kualitas'}),
                'harga' => pow($pen->harga, -$rkriteria->{'Harga'}),
                'status_stok_barang' => pow($vstock, $rkriteria->{'Status Stok Barang'}),
                'total_vektor_s' => pow($vpembayaran, $rkriteria->{'Jangka Waktu Pembayaran'})
                    * pow($pen->harga, -$rkriteria->{'Harga'})
                    * pow($vkualitas, $rkriteria->{'Kualitas'})
                    * pow($vstock, $rkriteria->{'Status Stok Barang'})
            ]);
            $item_vektor = [];
            foreach ($bobotrata as $bobot) {
                array_push($item_vektor, $bobot->kriterias->nilai);
            }
            // if ($key == 1) {
            //     return $vektors;
            // }

            //save to table vektor
            foreach ($bobotrata as $v) {
            }
        }

        $sum_vektor_s = 0;
        foreach ($vektors as $v) {
            $object = (object) $v;
            $sum_vektor_s +=  $object->total_vektor_s;
            error_log($object->total_vektor_s);
        }
        // return $sum_vektor_s;
        foreach ($vektors as $v) {
            $object = (object) $v;
            $id_penawaran = Penawaran::where('id_tender', $id)->where('id_user', $object->id_user)->first();
            $vektor = Vektor::where('id_user', $object->id_user)->where('id_tender', $id)->get();
            if (count($vektor) > 0) {
                // return $vektor;
                $vek =  Vektor::find($vektor[0]->id);
                $vek->nilai = $object->total_vektor_s / $sum_vektor_s;
                $vek->save();
            } else {
                Vektor::create([
                    'id_user' => $object->id_user,
                    'id_tender' => $id,
                    'nilai' => $object->total_vektor_s / $sum_vektor_s
                ]);
            }
        }

        $data_vektor_s =  Vektor::where('id_tender', $id)->orderBy('nilai', 'desc')->paginate(5);
        // $nama_tender

        // return $data_vektor_s;



        return view('perangkingan.hasilperangkingan', ['vektor' => $data_vektor_s]);
    }

    public function export_excel($id)
    {
        $data_report = Vektor::where('id_tender', $id)->get();
        $pdf = PDF::loadview('report.perangkingan', ['vektor' => $data_report]);
        $pdf->save(storage_path() . '/uniquename.pdf');
        return $pdf->stream();        // return (new PerangkinganReport($data_report))->download('rangking.xlsx');
        // return Excel::download(new HasilRankingExport, 'hasil_perrangkingan.xlsx');
    }
}
