<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table="countries";

    
    //avoid editing in countries table
    protected $fillable = [];
}
