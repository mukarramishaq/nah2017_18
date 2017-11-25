<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = "payments";
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
