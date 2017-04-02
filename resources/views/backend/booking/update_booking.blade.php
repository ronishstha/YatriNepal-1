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
                            <h4 class="title">Update Banner</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.booking.post.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Itinerary</label>
                                            <select class="form-control" name="itinerary" id="itinerary">
                                                @foreach($itineraries as $itinerary)
                                                    <option @if($booking->itinerary->title == "$itinerary->title") selected @endif> {{$itinerary->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Number</label>
                                            <input type="text" class="form-control" name="number" id="number" value="{{ Request::old('number') ? Request::old('number') : isset($booking) ? $booking->number : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Date</label>
                                            <input type="date" class="form-control" name="date" id="date" value="{{ Request::old('date') ? Request::old('date') : isset($booking) ? $booking->date : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option @if($booking->status =="published") selected @endif>published</option>
                                                <option @if($booking->status =="unpublished") selected @endif>unpublished</option>
                                                <option @if($booking->status =="trash") selected @endif>trash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
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
