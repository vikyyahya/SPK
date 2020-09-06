<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vektor extends Model
{
    //
    public $table = "vektor";

    protected $fillable = [
        'id_user', 'id_kriteria', 'nilai', 'id_penawaran',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'id_user', 'id')->withTrashed();
    }
}
