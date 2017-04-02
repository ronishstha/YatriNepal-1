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
            padding-left: 70px;
            padding-right: 70px;
        }
        h4{
            padding-left: 70px;
        }
    </style>
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title" align="center">{{ ucfirst($booking->itinerary->title) }} | Booked on: {{ $booking->created_at }}</h4>
                            <p class="category" align="center">
                                    {{ $booking->itinerary->itinerary_code }}
                            </p>
                        </div>
                        <div class="card-content table-responsive">
                            <h3 align="center"><strong>Booked For:</strong> {{ $booking->date }} </h3>
                            <h4 align="center"><strong>Number of People:</strong> {{ $booking->number }}</h4><br>

                                @php
                                    $i = 1;
                                @endphp
                                @foreach($bookdetails as $bookdetail)
                                        <p {{--align="center"--}}><strong>Person No:</strong> {{ $i }}</p>
                                        <p {{--align="center"--}}><strong>Name:</strong> {{ $bookdetail->title }} {{  $bookdetail->first_name }} {{ $bookdetail->middle_name }} {{ $bookdetail->last_name }}</p>
                                        <p {{--align="center"--}}><strong>Nationality:</strong> {{ $bookdetail->nationality }}</p>
                                        <p {{--align="center"--}}><strong>State:</strong> {{ $bookdetail->state }}</p>
                                        <p {{--align="center"--}}><strong>Date of Birth:</strong> {{ $bookdetail->date_of_birth}}</p>
                                        <p {{--align="center"--}}><strong>Email:</strong> {{ $bookdetail->email }}</p>
                                        <p {{--align="center"--}}><strong>Mobile:</strong> {{ $bookdetail->mobile }}</p>
                                        <p {{--align="center"--}}><strong>Landline:</strong> {{ $bookdetail->landline }}</p>
                                        <p {{--align="center"--}}><strong>Occupation:</strong> {{ $bookdetail->occupation }}</p>
                                        <p {{--align="center"--}}><strong>Passport No:</strong> {{ $bookdetail->passport_no }}</p>
                                        <p {{--align="center"--}}><strong>Place of Issue:</strong> {{ $bookdetail->place_of_issue }}</p>
                                        <p {{--align="center"--}}><strong>Issue Date:</strong> {{ $bookdetail->issue_date }}</p>
                                        <p {{--align="center"--}}><strong>Expiration Date:</strong> {{ $bookdetail->expiration_date }}</p>
                                        <h4 {{--align="center"--}}><strong>Detailed Mailing Address</strong></h4>
                                        <p {{--align="center"--}}>{!! $bookdetail->mailing_address !!} </p>
                                        <h4 {{--align="center"--}}><strong>Emergency Contact</strong></h4>
                                        <p {{--align="center"--}}>{!! $bookdetail->emergency_contact !!}</p>
                                        @php
                                            $i++;
                                        @endphp
                                @endforeach

                            <div class="single-button">
                            {{--<button class="btn-edit"><a href="{{ route('backend.booking.get.update', ['booking_id' => $booking->id]) }}">Edit</a></button>--}}
                            <button class="btn-delete"><a href="{{ route('backend.booking.trash', ['booking_id' => $booking->id]) }}">Delete</a></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection