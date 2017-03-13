@extends('backend.layouts.index')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Update Activity</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.activity.post.update') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" value="{{ Request::old('title') ? Request::old('title') : isset($activity) ? $activity->title : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Region</label>
                                            <select class="form-control" name="region" id="region">
                                                @foreach($regions as $region)
                                                    <option @if($activity->region->title == "$region->title") selected @endif> {{$region->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option @if($activity->status =="published") selected @endif>published</option>
                                                <option @if($activity->status =="unpublished") selected @endif>unpublished</option>
                                                <option @if($activity->status =="trash") selected @endif>trash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="activity_id" value="{{ $activity->id }}">
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
