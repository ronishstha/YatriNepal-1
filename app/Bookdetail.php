<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookdetail extends Model
{
    public function itinerary(){
        return $this->belongsTo('App\Itinerary');
    }

    public function booking(){
        return $this->belongsTo('App\Booking');
    }
}
