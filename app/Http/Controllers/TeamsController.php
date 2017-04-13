<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Team;
use App\User;

class TeamsController extends Controller
{
    public function getTeam(){
        $teams = Team::orderBy('created_at', 'desc')->paginate(5);

        if(!$teams){
            return redirect()->route('backend.dashboard')->with(['fail' => 'no team found']);
        }
        return view('backend.team.team', ['teams' => $teams]);
    }

    public function getCreateTeam(){
        return view('backend.team.create_team');
    }

    public function postCreateTeam(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:teams',
        ]);

        $team = new Team();
        $file = $request->file('image');
        if(!empty($file)){
            $uploadPath = public_path() . '/team';
            $fileName = date('Y-m-d-H-i-s') . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $team->image = $fileName;
        }
        $team->name = $request['name'];
        $team->title = $request['title'];
        $team->facebook = $request['facebook'];
        $team->twitter = $request['twitter'];
        $team->google_plus = $request['google_plus'];
        $team->instagram = $request['instagram'];
        $team->rss = $request['rss'];
        $team->description = $request['description'];
        $team->status = $request['status'];
        $user = Auth::user();
        $user->teams()->save($team);
        return redirect()->route('backend.team')->with(['success' => 'Successfully created']);
    }

    public function getUpdate($team_id){
        $team = Team::findOrFail($team_id);
        return view('backend.team.update_team', ['team' => $team]);
    }

    public function postUpdate(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        $team = Team::findOrFail($request['team_id']);
        $team->name = $request['name'];
        $team->title = $request['title'];
        $team->facebook = $request['facebook'];
        $team->twitter = $request['twitter'];
        $team->google_plus = $request['google_plus'];
        $team->instagram = $request['instagram'];
        $team->rss = $request['rss'];
        $team->status = $request['status'];
        $user = Auth::user();

        $old = $team->image;
        $file = $request->file('image');
        if($request->hasFile('image')){
            if(!empty($team->image)){
                if (file_exists(public_path() . '/team/' . $team->image)) {
                    unlink(public_path() . '/team/' . $team->image);
                }
            }
            $uploadPath = public_path() . '/team';
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $team->image = $fileName;
        }else{
            $team->image = $old;
        }

        $team->user_id = $user->id;
        $team->update();
        return redirect()->route('backend.team')->with(['success' => 'Successfully updated']);
    }

    public function getSingleTeam($team_id){
        $team = Team::where('id', $team_id)
            ->first();
        return view('backend.team.single_team', ['team' => $team]);

    }

    public function getDelete($team_id){
        $team = Team::findOrFail($team_id);
        if(!empty($team->image)) {
            if (file_exists(public_path() . '/team/' . $team->image)) {
                unlink(public_path() . '/team/' . $team->image);
            }
        }
        $team->delete();
        return redirect()->route('backend.team.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($team_id){
        $team = Team::findOrFail($team_id);
        $team->status = "trash";
        $team->update();
        return redirect()->route('backend.team')->with(['success' => 'Successfully moved to trash']);
    }

    public function DeleteForever(){
        $teams = Team::all();
        return view('backend.team.trash_team', ['teams' => $teams ]);
    }

    public function Restore($team_id){
        $team = Team::findorFail($team_id);
        $team->status = "published";
        $team->update();
        return redirect()->route('backend.team')->with(['success' => 'Item has been restored']);
    }

    public function DeleteAll(){
        $teams = Team::where('status', 'trash')->get();
        foreach($teams as $team){
            if($team->status = "trash"){
                if(!empty($team->image)) {
                    if (file_exists(public_path() . '/team/' . $team->image)) {
                        unlink(public_path() . '/team/' . $team->image);
                    }
                }
                $team->delete();
            }
        }
        return redirect()->route('backend.team.delete.page')->with(['success' => 'Trash Cleared']);
    }

    public function RestoreAll(){
        $teams = Team::all();
        foreach($teams as $team){
            if($team->status = "trash"){
                $team->status = "published";
                $team->update();
            }
        }
        return redirect()->route('backend.team')->with(['success' => 'All items restored']);
    }
}

