<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalI extends Model
{
    //use table
    protected $table = "personal_informations";
    
    //allow mass assignment
    protected $guarded = [];

     //relation with User
     public function user(){
        return $this->belongsTo('App\User');
    }
}
