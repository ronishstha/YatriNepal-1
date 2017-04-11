<?php

namespace App\Http\Controllers\frontend;

use App\Activity;
use App\Banner;
use App\Destination;
use App\Itinerary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\page;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;


class indexController extends Controller
{
    public function index(){


        $banners = Banner::get();
        $destination = Destination::get();
        $activities = Activity::get();
        $about_adventure = Page::where('slug','about-yatri-nepal')->firstOrFail();
        $itinerary = Itinerary::get();

        return view('frontend.layouts.Home.index',compact('banners','destination','activities','about_adventure','itinerary'));
    }

    public function getDetails($slug){
        $itinerary = Itinerary::where('slug',$slug)->firstOrFail();
        $similar_itinerary = Itinerary::where('category_id',$itinerary->category_id)->inRandomOrder(5)->get();

        return view('frontend.layouts.ProductDetails.ProductDetails',compact('itinerary','similar_itinerary'));
    }

    public function booking(){

        $itinerary = Itinerary::get();

        return view('frontend.layouts.Booking.Booking',compact('itinerary'));
    }

}