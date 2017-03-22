@extends('backend.layouts.index')
@section('content')
    <style>
        .btn-edit{
            background-color: dodgerblue;
            border: none;
            border-radius: 3px;
            height: 25px;
        }
        .btn-edit a{
            color: ghostwhite;
        }
        .btn-delete{
            background-color: #e53935;
            border: none;
            border-radius: 3px;
            height: 25px;
        }
        .btn-delete a{
            color: ghostwhite;
        }
        .single-button{
            width: 100px;
            margin-left:auto;
            margin-right: auto;
        }
    </style>
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title" align="center">{{ ucfirst($itinerary->title) }} | Last modified by: {{ $itinerary->user->name }}</h4>
                            <p class="category" align="center">Last updated on
                                    {{ $itinerary->updated_at }}
                            </p>
                        </div>
                        <div class="card-content table-responsive">
                            <p align="center"><strong>Trip Duration:</strong> {{ $itinerary->trip_duration }}</p>
                            <p align="center"><strong>Trekking Duration:</strong> {{ $itinerary->trekking_duration }}</p>
                            <p align="center"><strong>Trekking Grade:</strong> {{ $itinerary->trekking_grade }}</p>
                            <p align="center"><strong>Accommodation:</strong> {{ $itinerary->accommodation }}</p>
                            <p align="center"><strong>Meals:</strong> {{ $itinerary->meals }}</p>
                            <p align="center"><strong>Max Altitude:</strong> {{ $itinerary->max_altitude }}</p>
                            <p align="center"><strong>Best Time:</strong> {{ $itinerary->best_time }}</p>
                            <p align="center"><strong>Group Size:</strong> {{ $itinerary->group_size }}</p>
                            <p align="center"><strong>Start-End Point:</strong> {{ $itinerary->start_end }}</p>
                            <p align="center"><strong>Arrival:</strong> {{ $itinerary->arrival }}</p>
                            <p align="center"><strong>Departure:</strong> {{ $itinerary->departure }}</p>
                            <p align="center"><strong>Country:</strong> {{ $itinerary->country->title }}</p>
                            <p align="center"><strong>Destination:</strong> {{ $itinerary->destination->title }}</p>
                            <p align="center"><strong>Region:</strong> {{ $itinerary->region->title }}</p>
                            <p align="center"><strong>Activity:</strong> {{ $itinerary->activity->title }}</p>
                            <p align="center"><strong>Category:</strong> {{ $itinerary->category->title }}</p>
                            <h4 align="center"><strong>Trip Summary</strong></h4>
                            <p align="center">{!! $itinerary->summary !!} </p>
                            <h4 align="center"><strong>Trip Introduction</strong></h4>
                            <p align="center">{!! $itinerary->trip_introduction !!}</p>
                            <h4 align="center"><strong>Itinerary</strong></h4>
                            <p align="center">{!! $itinerary->itinerary !!}</p>
                            <h4 align="center"><strong>Important Note</strong></h4>
                            <p align="center">{!! $itinerary->important_note !!}</p>
                            <h4 align="center"><strong>Cost Inclusive</strong></h4>
                            <p align="center">{!! $itinerary->cost_inclusive  !!}</p>
                            <h4 align="center"><strong>Cost Exclusive</strong></h4>
                            <p align="center">{!! $itinerary->cost_exclusive !!} </p>
                            <h4 align="center"><strong>Trekking Group</strong></h4>
                            <p align="center">{!! $itinerary->trekking_group !!}</p>
                            <p align="center"><strong>Trip Status:</strong> {{ $itinerary->trip_status }}</p>
                            <img src="" />

                            @if(Storage::disk('itinerary')->has($itinerary->image))
                                <section class="row">
                                    <div class="col-md-6 col-md-offset-3">

                                        <img src="{{ route('backend.itinerary.image', ['filename' => $itinerary->image]) }}" alt="" class="img-responsive" style="border-radius: 2px;">
                                    </div>
                                </section>
                                <br>
                            @endif

                            @if(Storage::disk('itinerary')->has($itinerary->route_map))
                                <section class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <img src="{{ route('backend.itinerary.routemap', ['mapname' => $itinerary->route_map]) }}" alt="" class="img-responsive" style="border-radius: 2px;">
                                    </div>
                                </section>
                                <br>
                            @endif

                            <div class="single-button">
                            <button class="btn-edit"><a href="{{ route('backend.itinerary.get.update', ['itinerary_id' => $itinerary->id]) }}">Edit</a></button>
                            <button class="btn-delete"><a href="{{ route('backend.itinerary.trash', ['itinerary_id' => $itinerary->id]) }}">Delete</a></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection