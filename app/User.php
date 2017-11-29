<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','verification_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *
     *Relations
     */
     //with educational_informations table
    public function educationalI(){
        return $this->hasOne('App\EducationalI');
    }

    //with professional_informations table
    public function professionalI(){
        return $this->hasOne('App\ProfessionalI');
    }
    //wit personal_infromations table
    public function personalI(){
        return $this->hasOne('App\PersonalI'); 
    }
    //with entreprenuer_informations table
    public function entrepI(){
        return $this->hasOne('App\EntrepI');
    }
    //with stages table
    public function stage(){
        return $this->hasOne('App\Stage');
    }

    public function payment(){
        return $this->hasOne('App\Payment');
    }

    public function guest(){
        return $this->hasMany('App\Guest');
    }
    public function chalan(){
        return $this->hasOne('App\Chalan');
    }
    public function higherEducation(){
        return $this->hasOne('App\HigherEducation');
    }
}
