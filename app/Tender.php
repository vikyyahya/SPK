<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tender extends Model
{
    //
    use SoftDeletes;
    public $table = "tender";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nama_proyek', 'nama_tender', 'nama_pelanggan', 'batas_waktu'
    ];
}
