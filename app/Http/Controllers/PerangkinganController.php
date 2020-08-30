<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Bobot;
use App\Penawaran;
use App\User;
use App\Tender;
use \stdClass;



class PerangkinganController extends Controller
{
    //

    public function perangkingan(Request $request)
    {
        $bobot = Bobot::all();
        $tender = Tender::all();
        $bobotrata = Bobot::where('id_tender','1')->get();
        $penawaran = Penawaran::all();


        // cari rata2 
        

        return view('perangkingan.perangkingan', ['tender' => $tender]);
    }

    public function hitung(Request $request)
    {
        $id = "1";//id tender
        $bobot = Bobot::all();
        $bobotrata = Bobot::where('id_tender',$id)->get();
        $penawaran = Penawaran::where('id_tender',$id)->get();

        // cari rata2 
        //sum value
        $jmlbobot = Bobot::where('id_tender',$id)->sum('nilai');
        //cari rata2 kriteria
        $rkriteria = new stdClass();
        foreach ($bobotrata as $bobot){ 
            $rata2 = $bobot->nilai /$jmlbobot;
            // array_push($rkriteria,[$bobot->deskripsi => $rata2 ]);
            $variable = $bobot->deskripsi;
            $rkriteria->$variable = $rata2;
            }

        //pangkat value
        $vektors = [];

        foreach ($penawaran as $pen){ 
            $jangPembayaran = $pen->pembayaran;
            $kualitas = $pen->kualitas;
            $vpembayaran = '';
            $vkualitas = '';
            if($jangPembayaran == 'cash'){
                $vpembayaran = 1;
            }else if($jangPembayaran == 'tempo 14 hari'){
                $vpembayaran = 2;
            }else if($jangPembayaran == 'tempo 30 hari'){
                $vpembayaran = 3;
            }else if($jangPembayaran == 'tempo 60 hari'){
                $vpembayaran = 4;
            } 
            if($kualitas == 'bagus'){
                $vkualitas = 3;
            }else if($kualitas == 'sedang'){
                $vkualitas = 2;
            }else if($kualitas == 'rendah'){
                $vkualitas = 1;
            }
            
            $hasilpembayaran = "";
            $totalVektor= "";
            array_push($vektors,['id_iser'=> $pen->id_user,
            'pembayaran' => pow($vpembayaran,$rkriteria->{'Jangka Waktu Pembayaran'} ) ,
            'harga' => pow($pen->harga, $rkriteria->{'Harga'}),
            'kualitas' => pow($vkualitas,$rkriteria->{'Kualitas'}) ,
            'status_stock' => $vpembayaran/$rkriteria->{'Status Stok Barang'},
            ]);
            
        }
           
        // return print_r($rkriteria);
        return $vektors;



        return view('perangkingna.perangkingna', ['bobot' => $bobot]);
    }


}
