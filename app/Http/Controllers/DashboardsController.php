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

class DashboardsController extends Controller
{
    public function getDashboard(){
        $itineraries = Itinerary::orderBy('created_at', 'desc')->paginate(5);
        $countries = Country::all();
        $destinations = Destination::all();
        $activities = Activity::all();
        $regions = Region::all();
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(5);
        $reviews = Review::all();
        $categories = Category::all();
        return view('backend.dashboard', [
            'itineraries' => $itineraries,
            'countries' => $countries,
            'destinations' => $destinations,
            'activities' => $activities,
            'regions' => $regions,
            'bookings' => $bookings,
            'reviews' => $reviews,
            'categories' => $categories]);
    }
}
