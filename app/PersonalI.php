<?php

namespace App;
use Carbon\Carbon;
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

    public function age(){
        $dob = \DateTime::createFromFormat('m/d/Y',$this->dob)->format('Y-m-d');
        \Log::info($dob);
        return Carbon::parse($dob)->diff(Carbon::now())->format('%y years');;
    }

    // /**
    // * Accessor for Age.
    // */
    // public function getAgeAttribute()
    // {
    //     return Carbon::parse($this->dob)->diff(Carbon::now())->format('%y years, %m months and %d days')->age;
    // }
}
