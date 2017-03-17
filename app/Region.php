<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function destination(){
        return $this->belongsTo('App\Destination');
    }

    public function activities(){
        return $this->hasMany('App\Activities');
    }

    public function itineraries(){
        return $this->hasMany('App\Itinerary');
    }
}
