<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itinerary;
use App\Country;
use App\Destination;
use App\Activity;

class DashboardsController extends Controller
{
    public function getDashboard(){
        $itineraries = Itinerary::all();
        $countries = Country::all();
        $destinations = Destination::all();
        $activities = Activity::all();
        return view('backend.dashboard', ['itineraries' => $itineraries, 'countries' => $countries, 'destinations' => $destinations, 'activities' => $activities]);
    }
}
