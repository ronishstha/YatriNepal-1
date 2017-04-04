<?php

namespace App\Http\Controllers\frontend;

use App\Activity;
use App\Itinerary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination;

class DestinationController extends Controller
{

    public function dest()
    {
        $destination = Destination::get();
        $activities = Activity::get();
        $itinerary = Itinerary::get();
        return view('frontend.layouts.Destination.Destination',compact('destination','activities','itinerary'));
    }
}
