<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    //
    public $table = "tender";
    protected $fillable = [
        'nama_proyek','nama_tender','nama_pelanggan','batas_waktu'
    ];
}
