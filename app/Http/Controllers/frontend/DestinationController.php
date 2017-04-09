<?php

namespace App\Http\Controllers\frontend;

use App\Activity;
use App\Banner;
use App\Destination;
use App\Itinerary;
use App\Page;
use Hamcrest\Text\IsEmptyString;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DestinationController extends Controller
{

    public function dest()
    {
        $destination = Destination::get();
        $activities = Activity::get();
        $itinerary = Itinerary::get();
        return view('frontend.layouts.Destination.Destination',compact('destination','activities','itinerary'));
    }

    public function searchDest(Request $request){
        $activities_request = $request['activity'];
        $destination_request = $request['destination'];
        $price_request = $request['price'];

        $destination = Destination::get();
        $activities = Activity::get();
        $itinerary = Itinerary::get();


        if($activities_request === 'select' && $destination_request !== 'select' && $price_request !== 'select' ){
            $destination_pull = Destination::where('title',$destination_request)->firstOrFail();
            $itinerary = Itinerary::where('destination_id',$destination_pull->id)->where('cost',$price_request)->get();
        }
        elseif($destination_request === 'select' && $activities_request !== 'select' && $price_request !== 'select' ){
            $activities_pull = Activity::where('title',$activities_request)->firstOrFail();
            $itinerary = Itinerary::where('activity_id',$activities_pull->id)->where('cost',$price_request)->get();
        }
        elseif($price_request === 'select' && $destination_request !== 'select' && $activities_request !== 'select'){
            $destination_pull = Destination::where('title',$destination_request)->firstOrFail();
            $activities_pull = Activity::where('title',$activities_request)->firstOrFail();
            $itinerary = Itinerary::where('activity_id',$activities_pull->id)->where('destination_id',$destination_pull)->get();
        }
        elseif($activities_request === 'select' && $destination_request === 'select'){
            $itinerary = Itinerary::where('cost',$price_request)->get();
        }
        elseif($activities_request === 'select' && $price_request === 'select'){
            $destination_pull = Destination::where('title',$destination_request)->firstOrFail();
            $itinerary = Itinerary::where('destination_id',$destination_pull->id)->get();
        }
        elseif($destination_request === 'select' && $price_request === 'select'){
            $activities_pull = Activity::where('title',$activities_request)->firstOrFail();
            $itinerary = Itinerary::where('activity_id',$activities_pull->id)->get();
        }

        return view('frontend.layouts.Destination.Destination',compact('destination','activities','itinerary'));




    }
}
