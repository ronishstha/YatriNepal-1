<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Destination(){
        return $this->belongsTo('App\Destination');
    }
}
