<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    //
    public $table = "kriteria";

    protected $fillable = [
        'kriteria', 'kategori', 'nilai', 'deskripsi',
    ];
}
