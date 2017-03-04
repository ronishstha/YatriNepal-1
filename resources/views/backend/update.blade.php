@extends('backend.layouts.index')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Update Page</h4>
                            <p class="category">Complete your profile</p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.postupdate') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" value="{{ Request::old('title') ? Request::old('title') : isset($page) ? $page->title : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Page</label>
                                            <select class="form-control" name="page" id="page">
                                                <option @if($page->page =="Page") selected @endif>Page</option>
                                                <option @if($page->page =="Home") selected @endif>Home</option>
                                                <option @if($page->page =="About") selected @endif>About</option>
                                                <option @if($page->page =="Contact") selected @endif>Contact</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Content</label>
                                            <textarea row=20 class="form-control" name="content" id="content" >{{ Request::old('content')? Request::old('content') : isset($page)? $page->content : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="page_id" value="{{ $page->id }}">
                                <button type="submit" class="btn btn-primary pull-right">Edit</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
