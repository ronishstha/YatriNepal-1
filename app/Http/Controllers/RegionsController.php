<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Destination;
use App\User;

class RegionsController extends Controller
{
    public function getRegion(){
        $regions = Region::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.region.region', ['regions' => $regions]);
    }

    public function getCreateRegion(){
        $destinations = Region::all();
        return view('backend.region.create_region', ['destinations' => $destinations]);
    }

    public function postCreateRegion(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'destination' => 'required'
        ]);

        $region = new Region();
        $slug = $request['title'];
        $nation = $request['destination'];
        $region->title = $request['title'];
        $region->image = $request['image'];
        $region->description = $request['description'];
        $region->slug = str_slug($slug,'-');
        //-----requires changes-------

        $region->status = "published, unpublished, trash";
        $user = User::first();

        //-------------------------------
        $destination = Region::where('title', $nation)->first();

        $destination->regions()->save( $user->regions()->save($region));


        return redirect()->route('backend.region');
    }

    public function getUpdate($region_id){
        $region = Region::findorFail($region_id);
        return view('backend.region.update_region', ['region' => $region]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'destination' => 'required',
            'description' => 'required'
        ]);
        $region = Region::findOrFail($request['region_id']);
        $slug = $request['title'];
        $nation = $request['destination'];
        $region->title = $request['title'];
        $region->image = $request['image'];
        $region->destination = $request['destination'];
        $region->description = $request['description'];
        $region->slug = str_slug($slug, '-');
        //-----requires changes-------

        $region->status = "published, unpublished, trash";
        $user = User::where('id', 2)->first();
        $region->user_id = $user->id;

        //-------------------------------
        $destination = Region::where('title', $nation);
        $region->destination_id = $destination->id;
        $region->update();
        return redirect()->route('backend.region')->with(['success' => 'successfully updated']);
    }

    public function getDelete($region_id){
        $region = Region::findOrFail($region_id);
        $region->delete();
        return redirect()->route('backend.region');
    }



    public function getSingleRegion($region_slug){
        $region = Region::where('slug', $region_slug)
            ->first();
        return view('backend.region.single_region', ['region' => $region]);

    }
}
