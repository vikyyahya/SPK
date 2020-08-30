<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Bobot;
use App\Penawaran;
use App\User;
use App\Tender;


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
        $rkriteria = [];
        foreach ($bobotrata as $bobot){ 
            $rata2 = $jmlbobot/$bobot->nilai;
            array_push($rkriteria,[$bobot->deskripsi => $rata2 ]);
            }

        //pangkat value
        
        foreach ($penawaran as $pen){ 

            }


        return $penawaran;

        return view('perangkingna.perangkingna', ['bobot' => $bobot]);
    }


}
