@extends('backend.layouts.index')
@section('content')
    <style>
        .btn-view{
            background-color: forestgreen;
            border: none;
            border-radius: 3px;
            height: 25px;
        }
        .btn-view a{
            color: ghostwhite;
        }
    </style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">airplanemode_active</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Countries</p>
                        <h3 class="title">{{ count($countries) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">transfer_within_a_station</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Itineraries</p>
                        <h3 class="title">{{ count($itineraries) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">motorcycle</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Places</p>
                        <h3 class="title">{{ count($destinations) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">{{--
                            <i class="material-icons">local_offer</i> Tracked from Github--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">pool</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Activities</p>
                        <h3 class="title">{{ count($activities) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="purple">
                        <i class="material-icons">assignment_turned_in</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Bookings</p>
                        <h3 class="title">{{ count($bookings) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="gray">
                        <i class="material-icons">receipt</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Reviews</p>
                        <h3 class="title">{{ count($reviews) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">flight_takeoff</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Regions</p>
                        <h3 class="title">{{ count($regions) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">dns</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Category</p>
                        <h3 class="title">{{ count($categories) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card card-nav-tabs">
                    <div class="card-header" data-background-color="purple">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Recents:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#profile" data-toggle="tab">
                                            <i class="material-icons">transfer_within_a_station</i>
                                            Itinerary
                                            <div class="ripple-container"></div></a>
                                    </li>
                                    <li class="">
                                        <a href="#messages" data-toggle="tab">
                                            <i class="material-icons">build</i>
                                            Customized
                                            <div class="ripple-container"></div></a>
                                    </li>
                                    <li class="">
                                        <a href="#settings" data-toggle="tab">
                                            <i class="material-icons">receipt</i>
                                            Review
                                            <div class="ripple-container"></div></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Itinerary</th>
                                    <th>Destination</th>
                                    </thead>
                                    <tbody>
                                    @foreach($itineraries as $itinerary)
                                    <tr>
                                        <td>{{ $itinerary->title }}</td>
                                        <td>
                                           {{$itinerary->destination->title}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="tab-pane" id="messages">
                                <table class="table">

                                    <thead class="text-primary">
                                    <th>Name</th>
                                    <th>Itinerary</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($customizes as $customize)
                                    <tr>
                                        <td>{{ $customize->name }}</td>
                                        <td>{{  $customize->itinerary->title }}</td>
                                        <td><button class="btn-view"><a href="{{ route('backend.customize.single.customize', ['customize_slug' => $customize->slug])  }}">Details</a></button></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="settings">
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Name</th>
                                    <th>Itinerary</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($reviews as $review)
                                        <tr>
                                            <td>
                                                {{ $review->name }}
                                            </td>
                                            <td>
                                                {{ $review->itinerary->title }}
                                            </td>
                                            <td><button class="btn-view"><a href="{{ route('backend.review.single.review', ['review_slug' => $review->slug])  }}">Details</a></button></td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Bookings</h4>
                        <p class="category">Bookings made in the last 7 days</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            @if (count($bookings) == 0)
                                <p align="center">No bookings made this week</p>
                            @endif
                            @if(count($bookings) != 0)
                            <thead class="text-warning">
                            <th>Itinerary</th>
                            <th>No of People</th>
                            <th>Made at</th>
                            <th>Booked For</th>
                            </thead>
                            <tbody>

                            @foreach($bookings as $booking)
                            <tr>
                                <td>{{  $booking->itinerary->title }}</td>
                                <td>{{ $booking->number }}</td>
                                <td>{{ $booking->created_at }}</td>
                                <td>{{ $booking->date }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                                @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection