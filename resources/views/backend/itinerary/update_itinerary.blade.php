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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Update Itinerary</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.itinerary.post.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" value="{{ Request::old('title') ? Request::old('title') : isset($itinerary) ? $itinerary->title : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trip Duration</label>
                                            <input type="text" class="form-control" name="trip_duration" id="trip_duration" value="{{ Request::old('trip_duration') ? Request::old('trip_duration') : isset($itinerary) ? $itinerary->trip_duration : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trekking Duration</label>
                                            <input type="text" class="form-control" name="trekking_duration" id="trekking_duration" value="{{ Request::old('trekking_duration') ? Request::old('trekking_duration') : isset($itinerary) ? $itinerary->trekking_duration : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trekking Grade</label>
                                            <input type="text" class="form-control" name="trekking_grade" id="trekking_grade" value="{{ Request::old('trekking_grade') ? Request::old('trekking_grade') : isset($itinerary) ? $itinerary->trekking_grade : ''  }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Maximum Altitude</label>
                                            <input type="text" class="form-control" name="max_altitude" id="max_altitude" value="{{ Request::old('max_altitude') ? Request::old('max_altitude') : isset($itinerary) ? $itinerary->max_altitude : ''  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Best Time</label>
                                            <input type="text" class="form-control" name="best_time" id="best_time" value="{{ Request::old('best_time') ? Request::old('best_time') : isset($itinerary) ? $itinerary->best_time : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Group Size</label>
                                            <input type="text" class="form-control" name="group_size" id="group_size" value="{{ Request::old('group_size') ? Request::old('group_size') : isset($itinerary) ? $itinerary->group_size : ''  }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Starting Point-Ending Point</label>
                                            <input type="text" class="form-control" name="start_end" id="start_end" value="{{ Request::old('start_end') ? Request::old('start_end') : isset($itinerary) ? $itinerary->start_end : ''  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Arrival on</label>
                                            <input type="text" class="form-control" name="arrival" id="arrival" value="{{ Request::old('arrival') ? Request::old('arrival') : isset($itinerary) ? $itinerary->arrival : ''  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Departure from</label>
                                            <input type="text" class="form-control" name="departure" id="departure" value="{{ Request::old('departure') ? Request::old('departure') : isset($itinerary) ? $itinerary->departure : ''  }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Accommodation in Trek</label>
                                            <input type="text" class="form-control" name="accommodation" id="accommodation" value="{{ Request::old('accommodation') ? Request::old('accommodation') : isset($itinerary) ? $itinerary->accommodation : ''  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Meals</label>
                                            <input type="text" class="form-control" name="meals" id="meals" value="{{ Request::old('meals') ? Request::old('meals') : isset($itinerary) ? $itinerary->meals : ''  }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Date</label>
                                            <input type="text" class="form-control" name="date" id="date" value="{{ Request::old('date') ? Request::old('date') : isset($itinerary) ? $itinerary->date : ''  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cost</label>
                                            <input type="text" class="form-control" name="cost" id="cost" value="{{ Request::old('cost') ? Request::old('cost') : isset($itinerary) ? $itinerary->cost : ''  }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <label id="fileupload-example-3-label" for="fileupload-example-3">Image</label>
                                            <input type="file" id="fileupload-example-3" name="image" value="{{ Request::old('image') ? Request::old('image') : isset($itinerary) ? $itinerary->image : '' }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <label id="fileupload-example-3-label" for="fileupload-example-3">Route Map</label>
                                            <input type="file" id="fileupload-example-3" name="route_map" value="{{ Request::old('route_map') ? Request::old('route_map') : isset($itinerary) ? $itinerary->route_map : '' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Country</label>
                                            <select class="form-control" name="country" id="country">
                                                @if(count($countries) == 0)
                                                    <option value=null>No country available</option>
                                                @endif
                                                @foreach($countries as $country)
                                                    <option @if($itinerary->country->title == "$country->title") selected @endif>{{ $country->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Destination</label>
                                            <select class="form-control" name="destination" id="destination">
                                                @if(count($destinations) == 0)
                                                    <option value=null>No destination available</option>
                                                @endif
                                                @foreach($destinations as $destination)
                                                    <option @if($itinerary->destination->title == "$destination->title") selected @endif>{{ $destination->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Region</label>
                                            <select class="form-control" name="region" id="region">
                                                @if(count($regions) == 0)
                                                    <option value=null>No region available</option>
                                                @endif
                                                @foreach($regions as $region)
                                                    <option @if($itinerary->region->title == "$region->title") selected @endif>{{ $region->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Activity</label>
                                            <select class="form-control" name="activity" id="activity">
                                                @if(count($activities) == 0)
                                                    <option value=null>No activity available</option>
                                                @endif
                                                @foreach($activities as $activity)
                                                    <option @if($itinerary->activity->title == "$activity->title") selected @endif>{{ $activity->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Category</label>
                                            <select class="form-control" name="category" id="category">
                                                @if(count($categories) == 0)
                                                    <option value=null>No category available</option>
                                                @endif
                                                @foreach($categories as $category)
                                                    <option @if($itinerary->category->title == "$category->title") selected @endif>{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trekking Summary</label>
                                            <textarea row=20 class="form-control" name="summary" id="summary">{{ Request::old('summary') ? Request::old('summary') : isset($itinerary) ? $itinerary->summary : ''  }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trip Introduction</label>
                                            <textarea row=20 class="form-control" name="trip_introduction" id="trip_introduction">{{ Request::old('trip_introduction')  ? Request::old('trip_introduction') : isset($itinerary) ? $itinerary->trip_introduction : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Itinerary</label>
                                            <textarea row=20 class="form-control" name="itinerary" id="itinerary">{{ Request::old('itinerary') ? Request::old('itinerary') : isset($itinerary) ? $itinerary->itinerary : ''  }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Included in cost</label>
                                            <textarea row=20 class="form-control" name="cost_inclusive" id="cost_inclusive">{{ Request::old('cost_inclusive') ? Request::old('cost_inclusive') : isset($itinerary) ? $itinerary->cost_inclusive : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Not included in cost</label>
                                            <textarea row=20 class="form-control" name="cost_exclusive" id="cost_exclusive">{{ Request::old('cost_exclusive')  ? Request::old('cost_exclusive') : isset($itinerary) ? $itinerary->cost_exclusive : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trekking Group</label>
                                            <textarea row=20 class="form-control" name="trekking_group" id="trekking_group">{{ Request::old('trekking_group') ? Request::old('trekking_group') : isset($itinerary) ? $itinerary->trekking_group : ''  }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Important Note</label>
                                            <textarea row=20 class="form-control" name="important_note" id="important_note">{{ Request::old('important_note')  ? Request::old('important_note') : isset($itinerary) ? $itinerary->important_note : ''  }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trip Status</label>
                                            <select class="form-control" name="trip_status" id="trip_status">
                                                <option @if($itinerary->status =="Booking Open") selected @endif>Booking Open</option>
                                                <option @if($itinerary->status =="Join a Group") selected @endif>Join a Group</option>
                                                <option @if($itinerary->status =="Limited Space") selected @endif>Limited Space</option>
                                                <option @if($itinerary->status =="Sold Out") selected @endif>Sold Out</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option @if($itinerary->status =="published") selected @endif>published</option>
                                                <option @if($itinerary->status =="unpublished") selected @endif>unpublished</option>
                                                <option @if($itinerary->status =="trash") selected @endif>trash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="itinerary_id" value="{{ $itinerary->id }}">
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
