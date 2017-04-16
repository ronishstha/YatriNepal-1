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
        <section class="info-box fail">
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
                            <h4 class="title">Create Itinerary</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.itinerary.post.create') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" value="{{ Request::old('title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Itinerary Code</label>
                                            <input type="text" class="form-control" name="itinerary_code" id="itinerary_code" value="{{ Request::old('itinerary_code') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trip Duration</label>
                                            <input type="text" class="form-control" name="trip_duration" id="trip_duration" value="{{ Request::old('trip_duration') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trekking Duration</label>
                                            <input type="text" class="form-control" name="trekking_duration" id="trekking_duration" value="{{ Request::old('trekking_duration') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trekking Grade</label>
                                            <select class="form-control" name="trekking_grade" id="trekking_grade">
                                                <option>easy</option>
                                                <option>medium</option>
                                                <option>hard</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Maximum Altitude</label>
                                            <input type="text" class="form-control" name="max_altitude" id="max_altitude" value="{{ Request::old('max_altitude') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Best Time</label>
                                            <input type="text" class="form-control" name="best_time" id="best_time" value="{{ Request::old('best_time') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Group Size</label>
                                            <input type="text" class="form-control" name="group_size" id="group_size" value="{{ Request::old('group_size') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Starting Point-Ending Point</label>
                                            <input type="text" class="form-control" name="start_end" id="start_end" value="{{ Request::old('start_end') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Arrival on</label>
                                            <input type="text" class="form-control" name="arrival" id="arrival" value="{{ Request::old('arrival') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Departure from</label>
                                            <input type="text" class="form-control" name="departure" id="departure" value="{{ Request::old('departure') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Accommodation in Trek</label>
                                            <input type="text" class="form-control" name="accommodation" id="accommodation" value="{{ Request::old('accommodation') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Meals</label>
                                            <input type="text" class="form-control" name="meals" id="meals" value="{{ Request::old('meals') }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cost</label>
                                            <input type="text" class="form-control" name="cost" id="cost" value="{{ Request::old('cost') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label>Date</label>
                                            <input type="date" class="form-control" name="date" id="date" value="{{ Request::old('date') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <label id="fileupload-example-3-label" for="fileupload-example-3">Image</label>
                                            <input type="file" id="fileupload-example-3" name="image" value="{{ Request::old('image') }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <label id="fileupload-example-3-label" for="fileupload-example-3">Route Map</label>
                                            <input type="file" id="fileupload-example-3" name="route_map" value="{{ Request::old('route_map') }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label >Country</label>
                                            <select class="form-control country" name="country" id="country">
                                                @if(count($countries) == 0)
                                                    <option value=null>No country available</option>
                                                @endif
                                                <option value="0" disabled="true" selected="true">Select a Country</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--<div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label >Destination</label>
                                            <select class="form-control destination" name="destination" id="destination">
                                                --}}{{--@if(count($destinations) == 0)
                                                    <option value=null>No destination available</option>
                                                @endif--}}{{--
                                                    <option value="0" disabled="true" selected="true">-</option>
                                                --}}{{--@foreach($destinations as $destination)
                                                    <option>{{ $destination->title }}</option>
                                                @endforeach--}}{{--
                                            </select>
                                        </div>
                                    </div>--}}
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label>Region</label>
                                            <select class="form-control region" name="region" id="region">
                                                {{--@if(count($regions) == 0)
                                                    <option value=null>No region available</option>
                                                @endif
                                                @foreach($regions as $region)
                                                    <option>{{ $region->title }}</option>
                                                @endforeach--}}
                                                <option value="0" disabled="true" selected="true">-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label>Activity</label>
                                            <select class="form-control activity" name="activity" id="activity">
                                                {{--@if(count($activities) == 0)
                                                    <option value=null>No activity available</option>
                                                @endif
                                                @foreach($activities as $activity)
                                                    <option>{{ $activity->title }}</option>
                                                @endforeach--}}
                                                <option value="0" disabled="true" selected="true">-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label>Category</label>
                                            <select class="form-control category" name="category" id="category">
                                                @if(count($categories) == 0)
                                                    <option value=null>No category available</option>
                                                @endif
                                                @foreach($categories as $category)
                                                    <option value="">Select a category</option>
                                                    <option value="{{$category->id}}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label>Trekking Summary</label>
                                            <textarea row=20 class="form-control" name="summary" id="summary">{{ Request::old('summary') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label>Trip Introduction</label>
                                            <textarea row=20 class="form-control" name="trip_introduction" id="trip_introduction">{{ Request::old('trip_introduction') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label>Itinerary</label>
                                            <textarea row=20 class="form-control" name="itinerary" id="itinerary">{{ Request::old('itinerary') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label>Included in cost</label>
                                            <textarea row=20 class="form-control" name="cost_inclusive" id="cost_inclusive">{{ Request::old('cost_inclusive') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label>Not included in cost</label>
                                            <textarea row=20 class="form-control" name="cost_exclusive" id="cost_exclusive">{{ Request::old('cost_exclusive') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label>Trekking Group</label>
                                            <textarea row=20 class="form-control" name="trekking_group" id="trekking_group">{{ Request::old('trekking_group') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label>Important Note</label>
                                            <textarea row=20 class="form-control" name="important_note" id="important_note">{{ Request::old('important_note') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trip Status</label>
                                            <select class="form-control" name="trip_status" id="trip_status">
                                                <option>Booking Open</option>
                                                <option>Join a Group</option>
                                                <option>Limited Space</option>
                                                <option>Sold Out</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option>published</option>
                                                <option>unpublished</option>
                                                <option>trash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Featured</label>
                                            <select class="form-control" name="featured" id="featured">
                                                <option>no</option>
                                                <option>yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Best Selling</label>
                                            <select class="form-control" name="best_selling" id="best_selling">
                                                <option>no</option>
                                                <option>yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Special Package</label>
                                            <select class="form-control" name="special_package" id="special_package">
                                                <option>no</option>
                                                <option>yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Create</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
