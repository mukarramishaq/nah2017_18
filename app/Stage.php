<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    //
    protected $table = "stages";

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
