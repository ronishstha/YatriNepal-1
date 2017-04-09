@extends('backend.layouts.index')
@section('content')
    <style>
        #fileupload-example-3::-webkit-file-upload-button {
            color: gray;
            border: none;
            height: 30px;
            border-radius: 3px;
            background: #fff;
            border: 1px solid #ccc;
        }
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Update Country</h4>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.country.post.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" value="{{ Request::old('title') ? Request::old('title') : isset($country) ? $country->title : '' }}">
                                        </div>
                                    </div>
                                </div>

                                @if(!empty($country->flag))
                                    <td><img src="{{ URL::asset('country/' . $country->image ) }}" style="height:100px;width:100px;border-radius:3px"></td>
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <label id="fileupload-example-3-label" for="fileupload-example-3">Flag</label>
                                            <input type="file" id="fileupload-example-3" name="flag" value="{{ Request::old('flag') ? Request::old('flag') : isset($country) ? $country->flag : '' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option @if($country->status =="published") selected @endif>published</option>
                                                <option @if($country->status =="unpublished") selected @endif>unpublished</option>
                                                <option @if($country->status =="trash") selected @endif>trash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="country_id" value="{{ $country->id }}">
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
