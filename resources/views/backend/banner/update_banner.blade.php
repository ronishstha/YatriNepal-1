@extends('backend.layouts.index')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Update Banner</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.banner.post.update') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" value="{{ Request::old('title') ? Request::old('title') : isset($banner) ? $banner->title : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Image</label>

                                            {{------------------------Requires changes--------------------}}

                                            <input type="text" class="form-control" name="image" id="image" value="{{ Request::old('image') ? Request::old('image') : isset($banner) ? $banner->image : '' }}">

                                            {{-------------------------------------------------------------}}
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Description</label>
                                            <textarea row=20 class="form-control" name="description" id="description" >{{ Request::old('description')? Request::old('description') : isset($banner)? $banner->description : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option @if($category->status =="published") selected @endif>published</option>
                                                <option @if($category->status =="unpublished") selected @endif>unpublished</option>
                                                <option @if($category->status =="trash") selected @endif>trash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="banner_id" value="{{ $banner->id }}">
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
