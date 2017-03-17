<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function destinations(){
        return $this->hasMany('App\Destination');
    }

    public function itineraries(){
        return $this->hasMany('App\Itinerary');
    }
}
