<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function itinerary(){
        return $this->belongsTo('App\Itinerary');
    }

    public function bookdetails(){
        return $this->hasMany('App\Bookdetails');
    }
}
