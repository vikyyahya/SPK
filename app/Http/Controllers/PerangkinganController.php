<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Bobot;
use App\Penawaran;
use App\User;
use App\Tender;
use App\Vektor;
use \stdClass;



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

    public function hitung(Request $request)
    {
        $id = "1"; //id tender
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

        foreach ($penawaran as $pen) {
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
                'pembayaran' => pow($vpembayaran, $rkriteria->{'Jangka Waktu Pembayaran'}),
                'harga' => pow($pen->harga, -$rkriteria->{'Harga'}),
                'kualitas' => pow($vkualitas, $rkriteria->{'Kualitas'}),
                'status_stock' => pow($vstock, $rkriteria->{'Status Stok Barang'}),
                'total_vektor_s' => pow($vpembayaran, $rkriteria->{'Jangka Waktu Pembayaran'})
                    * pow($pen->harga, -$rkriteria->{'Harga'})
                    * pow($vkualitas, $rkriteria->{'Kualitas'})
                    * ($vpembayaran / $rkriteria->{'Status Stok Barang'})
            ]);
            $item_vektor = [];
            foreach ($bobotrata as $bobot) {
                array_push($item_vektor, $bobot->kriterias->nilai);
            }
            // return $item_vektor;

            //save to table vektor
            foreach ($bobotrata as $v) {
            }
        }

        //total all vektor
        // $total_all_vektor_s = '';


        // return $bobotrata;

        return $vektors;



        return view('perangkingna.perangkingna', ['bobot' => $bobot]);
    }
}
