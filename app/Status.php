<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //use table
    protected $table = "statuses";
    
    //allow mass assignment
    protected $guarded = [];

     //relation with User
     public function user(){
        return $this->belongsTo('App\User');
    }
}
