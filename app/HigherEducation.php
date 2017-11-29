<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HigherEducation extends Model
{
    protected $table = "high_edu";
    protected $guarded = [];
    public function user(){
        return $this->belongsTo('App\User');
    }
}