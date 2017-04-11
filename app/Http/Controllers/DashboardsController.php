<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itinerary;
use App\Country;
use App\Destination;
use App\Activity;
use App\Region;
use App\Booking;
use App\Review;
use App\Category;
use App\Customize;
use Carbon\Carbon;

class DashboardsController extends Controller
{
    public function getDashboard(){
        $itineraries = Itinerary::orderBy('created_at', 'desc')->take(5)->get();
        $countries = Country::all();
        $destinations = Destination::all();
        $activities = Activity::all();
        $regions = Region::all();
        /*$bookings = Booking::orderBy('created_at', 'desc')->take(5)->get();*/
        $reviews = Review::all();
        $categories = Category::all();
        $customizes = Customize::orderBy('created_at', 'desc')->take(5)->get();

        $date = new Carbon; //  DateTime string will be 2014-04-03 13:57:34

        $date->subDays(7); // or $date->subDays(7),  2014-03-27 13:58:25

        $bookings = Booking::where('created_at', '>', $date->toDateTimeString() )->get();

        return view('backend.dashboard', [
            'itineraries' => $itineraries,
            'countries' => $countries,
            'destinations' => $destinations,
            'activities' => $activities,
            'regions' => $regions,
            'bookings' => $bookings,
            'reviews' => $reviews,
            'categories' => $categories,
            'customizes' => $customizes
        ]);
    }
}
