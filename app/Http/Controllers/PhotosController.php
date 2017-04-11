<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Photo;
use App\User;
use App\Gallery;

class PhotosController extends Controller
{
    public function getPhoto(){
        $photos = Photo::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.photo.photo', ['photos' => $photos]);
    }

    public function getCreatePhoto(){
        $galleries = Gallery::all();
        return view('backend.photo.create_photo', ['galleries' => $galleries]);
    }

    public function postCreatePhoto(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'gallery' => 'required'
        ]);

        $photo = new Photo();
        $photobucket = $request['gallery'];
        $photo->status = $request['status'];
        $user = Auth::user();
        $gallery = Gallery::where('title', $photobucket)->first();
        $file = $request->file('image');
        if (!empty($file)) {
            $uploadPath = public_path() . '/gallery/' . $gallery->title;
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $photo->image = $fileName;
        }
        $photo->user()->associate($user);
        $photo->gallery()->associate($gallery);
        $photo->save();

        return redirect()->route('backend.photo')->with(['success' => 'Successfully created']);
    }


    public function getUpdate($photo_id){
        $photo = Photo::findorFail($photo_id);
        $galleries = Gallery::all();
        return view('backend.photo.update_photo', ['photo' => $photo, 'galleries' => $galleries]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'gallery' => 'required',
        ]);
        $photo = Photo::findOrFail($request['photo_id']);
        $photobucket = $request['gallery'];
        $photo->status = $request['status'];
        $user = Auth::user();
        $photo->user_id = $user->id;
        $gallery = Gallery::where('title', $photobucket)->first();
        $old = $photo->image;
        $file = $request->file('image');
        if($request->hasFile('image')){
            if(!empty($photo->image)){
                unlink(public_path() . "\\gallery\\" . '\\' . $gallery->title . '\\'. $photo->image);
            }
            $uploadPath = public_path() . '/gallery/' . $gallery->title;
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $photo->image = $fileName;
        }else{
            $photo->image = $old;
        }
        $photo->gallery_id = $gallery->id;
        $photo->update();
        return redirect()->route('backend.photo')->with(['success' => 'successfully updated']);
    }

    public function getDelete($photo_id){
        $photo = Photo::where('id', $photo_id)
            ->first();
        if(!empty($photo->image)){
            unlink(public_path() . "\\gallery\\" . '\\' . $photo->gallery->title . '\\'. $photo->image);
        }
        $photo->delete();
        return redirect()->route('backend.photo.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getSinglePhoto($photo_id){
        $photo = Photo::where('id', $photo_id)
            ->first();
        return view('backend.photo.single_photo', ['photo' => $photo]);
    }

    public function getTrash($photo_id){
        $photo = Photo::findOrFail($photo_id);
        $photo->status = "trash";
        $photo->update();
        return redirect()->route('backend.photo')->with(['success' => 'Successfully moved to trash']);
    }

    public function DeleteForever(){
        $photos = Photo::all();
        return view('backend.photo.trash_photo', ['photos' => $photos ]);
    }

    public function Restore($photo_id){
        $photo = Photo::findorFail($photo_id);
        $photo->status = "published";
        $photo->update();
        return redirect()->route('backend.photo')->with(['success' => 'Item has been restored']);
    }

    public function DeleteAll(){
        $photos = Photo::where('status', 'trash')->get();
        foreach($photos as $photo){
            if($photo->status = "trash"){
                $photo->delete();
            }
        }
        return redirect()->route('backend.photo.delete.page')->with(['success' => 'Trash Cleared']);
    }

    public function RestoreAll(){
        $photos = Photo::all();
        foreach($photos as $photo){
            if($photo->status = "trash"){
                $photo->status = "published";
                $photo->update();
            }
        }
        return redirect()->route('backend.photo')->with(['success' => 'All items restored']);
    }
}
