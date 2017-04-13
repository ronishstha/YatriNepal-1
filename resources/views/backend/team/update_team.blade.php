@extends('backend.layouts.index')

@section('style')
    <link href="{{ URL::asset('/assets/css/table.css') }}" rel="stylesheet"/>
@endsection

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
    @if(count($errors) > 0)
        <section class="info-box fail">eam
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </section>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Update Team</h4>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.team.post.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{ Request::old('name') ? Request::old('name') : isset($team) ? $team->name : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" value="{{ Request::old('title') ? Request::old('title') : isset($team) ? $team->title : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Facebook</label>
                                            <input type="text" class="form-control" name="facebook" id="facebook" value="{{ Request::old('facebook') ? Request::old('facebook') : isset($team) ? $team->facebook : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Twitter</label>
                                            <input type="text" class="form-control" name="twitter" id="twitter" value="{{ Request::old('twitter') ? Request::old('twitter') : isset($team) ? $team->twitter : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Google Plus</label>
                                            <input type="text" class="form-control" name="google_plus" id="google_plus" value="{{ Request::old('google_plus') ? Request::old('google_plus') : isset($team) ? $team->google_plus : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Instagram</label>
                                            <input type="text" class="form-control" name="instagram" id="instagram" value="{{ Request::old('instagram') ? Request::old('instagram') : isset($team) ? $team->instagram : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Rss</label>
                                            <input type="text" class="form-control" name="rss" id="rss" value="{{ Request::old('rss') ? Request::old('rss') : isset($team) ? $team->rss : '' }}">
                                        </div>
                                    </div>
                                </div>

                                @if(!empty($team->image))
                                    @if(file_exists(public_path(). '/team/' . $team->image))
                                        <td><img src="{{ URL::asset('team/' . $team->image ) }}" style="height:100px;width:100px;border-radius:3px"></td>
                                    @endif
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <label id="fileupload-example-3-label" for="fileupload-example-3">Image</label>
                                            <input type="file" id="fileupload-example-3" name="flag" value="{{ Request::old('image') ? Request::old('image') : isset($team) ? $team->image : '' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label>Description</label>
                                            <textarea row=20 class="form-control" name="description" id="description" >{{ Request::old('description')? Request::old('description') : isset($team)? $team->description : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option @if($team->status =="published") selected @endif>published</option>
                                                <option @if($team->status =="unpublished") selected @endif>unpublished</option>
                                                <option @if($team->status =="trash") selected @endif>trash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="team_id" value="{{ $team->id }}">
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
