<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\User;

class PageController extends Controller
{
    public function getPage(){
        $pages = Page::orderBy('created_at', 'desc')->paginate(3);

        if(!$pages){
            return redirect()->route('backend.dashboard')->with(['fail' => 'no pages found']);
        }
        return view('backend.pages.pages', ['pages' => $pages]);
    }

    public function getCreatePage(){
        return view('backend.pages.create');
    }

    public function postPage(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'page'  => 'required',
            'content' => 'required'
        ]);
        $slug = $request['title'];
        $pages = new Page();
        $pages->title = $request['title'];
        $pages->page = $request['page'];
        $pages->content = $request['content'];
        $pages->slug = str_slug($slug, '-');

        //----------requires changes---------
        $pages->status = "published, unpublished, trash";
        $user = User::first();
        //----------requires changes---------

        $user->pages()->save($pages);
        return redirect()->route('backend.pages');
    }

    public function getUpdate($page_id){
        $page = Page::findOrFail($page_id);
        return view('backend.pages.update', ['page' => $page]);
    }

    public function postUpdate(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'page'  => 'required',
            'content' => 'required'
        ]);
        $page = Page::findOrFail($request['page_id']);
        $page->title = $request['title'];
        $page->page = $request['page'];
        $page->content = $request['content'];

        //--------------------requires changes----------------
        $page->status = "published, unpublished, trash";
        $user = User::where('id', 2)->first();
        $page->user_id = $user->id;
        //-----------------------------------

        $page->update();
        return redirect()->route('backend.pages')->with(['success' => 'successfully updated']);
    }

    public function getDelete($page_id){
        $page = Page::findOrFail($page_id);
        $page->delete();
        return redirect()->route('backend.pages');
    }

    public function getSinglePage($page_slug){
        $page=Page::where('slug',$page_slug)
            ->first();
        return view('backend.pages.single_page', ['page' => $page]);
    }
}
