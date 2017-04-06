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

class SearchController extends Controller
{
    public function getResult(Request $request){
        $activities_request = $request['activity'];
        $destination_request = $request['destination'];


        $about_adventure = Page::where('slug','about-yatri-nepal')->firstOrFail();
        $banners = Banner::get();
        $activities = Activity::get();
        $destination = Destination::get();

        if($activities_request === ''){
            $destination_pull = Destination::where('title',$destination_request)->firstOrFail();
            $itinerary = Itinerary::where('destination_id',$destination_pull->id)->get();
        }
        elseif($destination_request === ''){
            $activities_pull = Activity::where('title',$activities_request)->firstOrFail();
            $itinerary = Itinerary::where('activity_id',$activities_pull->id)->get();
        }
        else{
            $activities_pull = Activity::where('title',$activities_request)->firstOrFail();
            $destination_pull = Destination::where('title',$destination_request)->firstOrFail();
            $itinerary = Itinerary::where('activity_id',$activities_pull->id && 'destination_id',$destination_pull->id)->get();
        }

        return view('frontend.layouts.Search.SearchPage',compact('itinerary','about_adventure','banners','activities','destination'));
//          return view('frontend.layouts.Search.SearchResult',compact('itinerary'));
    }

}
