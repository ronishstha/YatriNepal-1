<?php

namespace App\Http\Controllers\frontend;

use App\Activity;
use App\Banner;
use App\Destination;
use App\Itinerary;
use App\Review;
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
        $bestSell = Itinerary::where('best_selling','yes')->get();


        return view('frontend.layouts.Home.index',compact('banners','destination','activities','about_adventure','itinerary','bestSell'));
    }

    public function getDetails($slug){
        $itinerary = Itinerary::where('slug',$slug)->firstOrFail();
        $rating = Review::where('itinerary_id',$itinerary->id)->get();

        if(!empty($rating)) {

//            $accomodate = $rating->accommodation;
//            $meals = $rating->meals;
//            $transportation = $rating->transportation;
//            $pre_info = $rating->pre_info;
//            $staffs = $rating->staffs;
//            $money_value = $rating->money_value;

            $count = 0;
            $allrating = 0;
            foreach($rating as $ratingz){

                $allrating = $allrating + $ratingz->overall;
            }
            if(count($rating) != 0)
            $average = round($allrating / count($rating));
            else
            $average = 0;
        }
        elseif(empty($rating)){
            $rating = 0;
            $average= 0;
        }
        $similar_itinerary = Itinerary::where('category_id', $itinerary->category_id)->inRandomOrder(5)->get();
        return view('frontend.layouts.ProductDetails.ProductDetails',compact('itinerary','similar_itinerary','rating','average'));
    }

    public function booking(){

        $itinerary = Itinerary::get();

        return view('frontend.layouts.Booking.Booking',compact('itinerary'));
    }

}
