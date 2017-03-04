<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    public function getAbout(){
        $abouts = About::all();
        if(!$abouts){
            return redirect()->route('backend.dashboard')->with(['fail' => 'no content available']);
        }
        return view('backend.pages', ['abouts' => $abouts]);
    }

    public function postAbout(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
        $abouts = new About();
        $abouts->title = $request['title'];
        $abouts->content = $request['content'];
        $abouts->save();
        return redirect()->route('backend.dashboard');
    }
}
