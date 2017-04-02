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
        p{
            padding-left: 60px;
            padding-right: 60px;
        }
        h4{
            padding-left: 60px;
        }
        .itinerary-gallery{
            padding-left: 200px;
            padding-right: 200px;
            padding-bottom: 30px;
        }

        .itgallery{
            padding-top: 2px;
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
                            <h4 align="center" ><strong>Itinerary Code:</strong> {{  $itinerary->itinerary_code }}</h4>
                            <p ><strong>Trip Duration:</strong> {{ $itinerary->trip_duration }}</p>
                            <p ><strong>Trekking Duration:</strong> {{ $itinerary->trekking_duration }}</p>
                            <p ><strong>Trekking Grade:</strong> {{ $itinerary->trekking_grade }}</p>
                            <p ><strong>Accommodation:</strong> {{ $itinerary->accommodation }}</p>
                            <p ><strong>Meals:</strong> {{ $itinerary->meals }}</p>
                            <p ><strong>Max Altitude:</strong> {{ $itinerary->max_altitude }}</p>
                            <p ><strong>Best Time:</strong> {{ $itinerary->best_time }}</p>
                            <p ><strong>Group Size:</strong> {{ $itinerary->group_size }}</p>
                            <p ><strong>Start-End Point:</strong> {{ $itinerary->start_end }}</p>
                            <p ><strong>Arrival:</strong> {{ $itinerary->arrival }}</p>
                            <p ><strong>Departure:</strong> {{ $itinerary->departure }}</p>
                            <p ><strong>Country:</strong> {{ $itinerary->country->title }}</p>
                            <p ><strong>Destination:</strong> {{ $itinerary->destination->title }}</p>
                            <p ><strong>Region:</strong> {{ $itinerary->region->title }}</p>
                            <p ><strong>Activity:</strong> {{ $itinerary->activity->title }}</p>
                            <p ><strong>Category:</strong> {{ $itinerary->category->title }}</p>
                            <h4 ><strong>Trip Summary</strong></h4>
                            <p >{!! $itinerary->summary !!} </p>
                            <h4 ><strong>Trip Introduction</strong></h4>
                            <p >{!! $itinerary->trip_introduction !!}</p>
                            <h4 ><strong>Itinerary</strong></h4>
                            <p >{!! $itinerary->itinerary !!}</p>
                            <h4 ><strong>Important Note</strong></h4>
                            <p >{!! $itinerary->important_note !!}</p>
                            <h4 ><strong>Cost Inclusive</strong></h4>
                            <p >{!! $itinerary->cost_inclusive  !!}</p>
                            <h4 ><strong>Cost Exclusive</strong></h4>
                            <p >{!! $itinerary->cost_exclusive !!} </p>
                            <h4 ><strong>Trekking Group</strong></h4>
                            <p >{!! $itinerary->trekking_group !!}</p>
                            <p ><strong>Trip Status:</strong> {{ $itinerary->trip_status }}</p>
                            <p ><strong>Featured:</strong> {{ $itinerary->featured }}</p>
                            <p ><strong>Best Selling:</strong> {{ $itinerary->best_selling }}</p>
                            <p ><strong>Special Package:</strong> {{ $itinerary->special_package }}</p>


                            @if(!empty($itinerary->image))
                                <section class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <img src="{{ URL::asset('itinerary/' . $itinerary->image) }}" alt="" class="img-responsive" style="border-radius: 2px;">
                                    </div>
                                </section>
                                <br>
                            @endif

                            @if(!empty($itinerary->route_map))
                                <section class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <img src="{{ URL::asset('itinerary/' . $itinerary->route_map) }}" alt="" class="img-responsive" style="border-radius: 2px;">
                                    </div>
                                </section>
                                <br>
                            @endif

                            <h4 align="center"><strong>Photo Gallery</strong></h4>
                            <div class="itinerary-gallery">
                                @foreach($photos as $photo)
                                    <td><img class="itgallery" src="{{ URL::asset('gallery/' . $photo->gallery->title . '/' . $photo->image) }}" style="height:100px;width:100px;border-radius:3px"></td>
                                @endforeach
                            </div>

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