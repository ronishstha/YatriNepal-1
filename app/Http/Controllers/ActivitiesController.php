<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Activity;
use App\User;
use App\Region;

class ActivitiesController extends Controller
{
    public function getActivity(){
        $activities = Activity::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.activity.activity', ['activities' => $activities]);
    }

    public function getCreateActivity(){
        $regions = Region::all();
        return view('backend.activity.create_activity', ['regions' => $regions]);
    }

    public function postCreateActivity(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'region' => 'required'
        ]);

        $activity = new Activity();
        $slug = $request['title'];
        $area = $request['region'];
        $activity->title = $request['title'];
        $activity->slug = str_slug($slug,'-');
        $activity->status = $request['status'];
        $user = Auth::user();
        $region = Region::where('title', $area)->first();
        $activity->user()->associate($user);
        $activity->region()->associate($region);
        $activity->save();

        return redirect()->route('backend.activity')->with(['success' => 'Successfully created']);;
    }

    public function getUpdate($activity_id){
        $activity = Activity::findorFail($activity_id);
        $regions = Region::all();
        return view('backend.activity.update_activity', ['activity' => $activity, 'regions' => $regions]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'region' => 'required',
        ]);
        $activity = Activity::findOrFail($request['activity_id']);
        $slug = $request['title'];
        $area = $request['region'];
        $activity->title = $request['title'];
        $activity->slug = str_slug($slug, '-');
        $activity->status = $request['status'];
        $user = Auth::user();
        $activity->user_id = $user->id;
        $region = Region::where('title', $area)->first();
        $activity->region_id = $region->id;
        $activity->update();
        return redirect()->route('backend.activity')->with(['success' => 'Successfully updated']);
    }

    public function getDelete($activity_id){
        $activity = Activity::findOrFail($activity_id);
        $activity->delete();
        return redirect()->route('backend.activity.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($activity_id){
        $activity = Activity::findOrFail($activity_id);
        $activity->status = "trash";
        $activity->update();
        return redirect()->route('backend.activity')->with(['success' => 'Successfully moved to trash']);
    }

    public function DeleteForever(){
        $activities = Activity::all();
        return view('backend.activity.trash_activity', ['activities' => $activities ]);
    }

    public function Restore($activity_id){
        $activity = Activity::findorFail($activity_id);
        $activity->status = "published";
        $activity->update();
        return redirect()->route('backend.activity');
    }

    public function DeleteAll(){
        $activities = Page::all();
        foreach($activities as $activity){
            if($activity->status = "trash"){
                $activity->delete();
            }
        }
        return redirect()->route('backend.activity.delete.activity')->with(['success' => 'Trash Cleared']);
    }

    public function RestoreAll(){
        $activities = Page::all();
        foreach($activities as $activity){
            if($activity->status = "trash"){
                $activity->status = "published";
                $activity->update();
            }
        }
        return redirect()->route('backend.activity')->with(['success' => 'All items restored']);
    }
}
