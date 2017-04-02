@extends('backend.layouts.index')

@section('style')
    <link href="{{ URL::asset('/assets/css/table.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    @if(count($errors) > 0)
        <section class="info-box fail">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </section>
    @endif
    @if(Session::has('success'))
        <section class="info-box success">
            {{ Session::get('success') }}
        </section>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Bookings</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.booking.get.firstcreate') }}">Book Now</a>
                            <a href="{{ route('backend.booking.delete.page') }}">
                                <i class="material-icons delete">delete
                                    @php
                                        $count = count($bookings);
                                        $i = 0;
                                    @endphp
                                    @foreach($bookings as $booking)
                                        @php

                                            if($booking->status == "trash"){
                                                $i += 1;
                                        }
                                        @endphp
                                    @endforeach
                                    @if($i != 0)
                                        <span class="noti-badge">{{ $i }}</span>
                                    @endif
                                </i>
                            </a>
                            @if(count($bookings) == 0 || $count == $i)
                                <br><p align="center">No booking available<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Itinerary</th>
                                    <th>No of people</th>
                                    <th>Made at</th>
                                    <th>Booked For</th>
                                    <th>Edit</th>
                                    <th>Details</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $booking)
                                        @if($booking->status == "published" || $booking->status == "unpublished")
                                            <tr>
                                                <td>{{ $booking->itinerary->title }}</td>
                                                <td>{{ $booking->number }}</td>
                                                <td>{{ $booking->created_at }}</td>
                                                <td>{{ $booking->date }}</td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.booking.get.update', ['booking_id' => $booking->id]) }}">Edit</a></button></td>
                                                <td><button class="btn-view"><a href="{{ route('backend.booking.single.booking', ['booking_id' => $booking->id])  }}">Details</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.booking.trash', ['booking_id' => $booking->id]) }}">Delete</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $bookings->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($bookings->currentPage() !== 1)
                                    <a href ="{{ $bookings->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($bookings->currentPage() !== $bookings->lastPage() && $bookings->hasPages())
                                    <a href ="{{ $bookings->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
                                    @endif--}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
