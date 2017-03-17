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
                            <h4 class="title">Itineraries</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.itinerary.get.create') }}">Create Itinerary</a>
                            <a href="{{ route('backend.itinerary.delete.page') }}">
                                <i class="material-icons delete">delete
                                    @php
                                        $count = count($itineraries);
                                        $i = 0;
                                    @endphp
                                    @foreach($itineraries as $itinerary)
                                        @php

                                            if($itinerary->status == "trash"){
                                                $i += 1;
                                        }
                                        @endphp
                                    @endforeach
                                    @if($i != 0)
                                        <span class="noti-badge">{{ $i }}</span>
                                    @endif
                                </i>
                            </a>
                            @if(count($itineraries) == 0 || $count == $i)
                                <br><p align="center">No itinerary available<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($itineraries as $itinerary)
                                        @if($itinerary->status == "published" || $itinerary->status == "unpublished")
                                            <tr>
                                                <td><a href="{{ route('backend.itinerary.single.itinerary', ['itinerary_id' => $itinerary->id]) }}">{{ $itinerary->title }}</a></td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.itinerary.get.update', ['itinerary_id' => $itinerary->id]) }}">Edit</a></button></td>
                                                <td><button class="btn-view"><a href="{{ route('backend.itinerary.single.itinerary', ['itinerary_slug' => $itinerary->slug])  }}">View</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.itinerary.trash', ['itinerary_id' => $itinerary->id]) }}">Delete</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $itineraries->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($itineraries->currentPage() !== 1)
                                    <a href ="{{ $itineraries->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($itineraries->currentPage() !== $itineraries->lastPage() && $itineraries->hasPages())
                                    <a href ="{{ $itineraries->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
