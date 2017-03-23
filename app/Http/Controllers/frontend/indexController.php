<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function index(){

        $banners = DB::table('banners')->get();
        $destination = DB::table('destinations')->get();
        $activities = DB::table('activities')->get();

        return view('frontend.layouts.Home.index',compact('banners','destination','activities'));
    }
}
