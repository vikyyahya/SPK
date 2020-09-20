<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vektor extends Model
{
    //
    public $table = "vektor";

    protected $fillable = [
        'id_user', 'nilai', 'id_tender',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'id_user', 'id')->withTrashed();
    }

    public function tender()
    {
        return $this->belongsTo('App\Tender', 'id_tender', 'id');
    }
}
