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
        'name', 'email', 'password',
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
    public function PersonalI(){
        return $this->hasOne('App\PersonalI');
    }
    //with entreprenuer_informations table
    public function entrepI(){
        return $this->hasOne('App\EntrepI');
    }
}
