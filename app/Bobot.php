<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    //
    public $table = "bobot";

    protected $fillable = [
        'deskripsi', 'kategori', 'nilai', 'id_tender', 'id_kriteria'
    ];


    public function tender()
    {
        return $this->belongsTo('App\Tender', 'id_tender', 'id')->withTrashed();
    }

    public function kriterias()
    {
        return $this->belongsTo('App\Kriteria', 'id_kriteria', 'id');
    }
}
