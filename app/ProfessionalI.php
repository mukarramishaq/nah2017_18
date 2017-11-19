<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionalI extends Model
{
    //use table
    protected $table = "professional_informations";
    
    //allow mass assignment
    protected $guarded = [];

     //relation with User
    public function user(){
        return $this->belongsTo('App\User');
    }
}
