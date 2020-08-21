<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    //
    public $table = "penawaran";

    protected $fillable = [
        'id_user', 'id_tender', 'nama_barang','harga','stock','pembayaran',
    ];
}
