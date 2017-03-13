<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Banner;
use App\User;

class BannerController extends Controller
{
    public function getBanner(){
        $banners = Banner::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.banner.banner', ['banners' => $banners]);
    }

    public function getCreateBanner(){
        return view('backend.banner.create_banner');
    }

    public function postCreateBanner(Request $request){
        $this->validate($request, [
           'title' => 'required',
           'image' => 'required',
           'description' => 'required',
        ]);

        $banner = new Banner();
        $file = $request->file('image');
        $uploadPath = storage_path() . '/app';
        $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
        $file->move($uploadPath, $fileName);
        $banner->image = $fileName;
        $slug = $request['title'];
        $banner->title = $request['title'];
        $banner->description = $request['description'];
        $banner->slug = str_slug($slug,'-');
        $banner->status = $request['status'];
        $user = Auth::user();
        $user->banners()->save($banner);
        return redirect()->route('backend.banner')->with(['success' => 'Successfully created']);
    }

    public function getUpdate($banner_id){
        $banner = Banner::findorFail($banner_id);
        return view('backend.banner.update_banner', ['banner' => $banner]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);
        $banner = Banner::findOrFail($request['banner_id']);
        $old = $banner->image;
        $file = $request->file('image');
        if($request->hasFile('image')){
            if(!empty($banner->image)){
                unlink(storage_path() . "\\app\\" . $banner->image);
            }
            $uploadPath = storage_path() . '/app';
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $banner->image = $fileName;
        }else{
            $banner->image = $old;
        }
        $slug = $request['title'];
        $banner->title = $request['title'];
        $banner->description = $request['description'];
        $banner->slug = str_slug($slug,'-');
        $banner->status = $request['status'];
        $user = Auth::user();
        $banner->user_id = $user->id;
        $banner->update();
        return redirect()->route('backend.banner')->with(['success' => 'Successfully updated']);
    }

    public function getDelete($banner_id){
        $banner = Banner::findOrFail($banner_id);
        $banner->delete();
        return redirect()->route('backend.banner.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($banner_id){
        $banner = Banner::findOrFail($banner_id);
        $banner->status = "trash";
        $banner->update();
        return redirect()->route('backend.banner')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSingleBanner($banner_slug){
        $banner = Banner::where('slug', $banner_slug)
                        ->first();
        return view('backend.banner.single_banner', ['banner' => $banner]);

    }

    public function DeleteForever(){
        $banners = Banner::all();
        return view('backend.banner.trash_banner', ['banners' => $banners ]);
    }

    public function Restore($banner_id){
        $banner = Banner::findorFail($banner_id);
        $banner->status = "published";
        $banner->update();
        return redirect()->route('backend.banner');
    }

    public function getImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}
