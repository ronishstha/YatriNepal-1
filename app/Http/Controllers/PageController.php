<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $page = new Page();
        $page->title = $request['title'];
        $page->page = $request['page'];
        $page->content = $request['content'];
        $page->slug = str_slug($slug, '-');
        $page->status = $request['status'];
        $user = Auth::user();
        $user->pages()->save($page);
        return redirect()->route('backend.pages')->with(['success' => 'Successfully created']);
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
        $page->status = $request['status'];
        $user = Auth::user();
        $page->user_id = $user->id;
        $page->update();
        return redirect()->route('backend.pages')->with(['success' => 'Successfully updated']);
    }

    public function getDelete($page_id){
        $page = Page::findOrFail($page_id);
        $page->delete();
        return redirect()->route('backend.pages.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($page_id){
        $page = Page::findOrFail($page_id);
        $page->status = "trash";
        $page->update();
        return redirect()->route('backend.pages')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSinglePage($page_slug){
        $page = Page::where('slug',$page_slug)
                ->first();
        return view('backend.pages.single_page', ['page' => $page]);
    }

    public function DeleteForever(){
        $pages = Page::all();
        return view('backend.pages.trash_pages', ['pages' => $pages ]);
    }

    public function Restore($page_id){
        $page = Page::findorFail($page_id);
        $page->status = "published";
        $page->update();
        return redirect()->route('backend.pages');
    }
}
