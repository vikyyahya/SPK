<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    //
    public $table = "penawaran";

    protected $fillable = [
        'id_user', 'id_tender', 'nama_barang', 'harga', 'stock', 'pembayaran', 'nama_dokumen', 'kualitas',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function tender()
    {
        return $this->belongsTo('App\Tender', 'id_tender', 'id');
    }
}
