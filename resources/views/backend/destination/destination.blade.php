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
                            <h4 class="title">Destination</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.destination.get.create') }}">Create Destination</a>
                            <a href="{{ route('backend.destination.delete.page') }}">
                                <i class="material-icons delete">delete</i>
                            </a>
                            @php
                                $count = count($destinations);
                                $i = 0;
                            @endphp
                            @foreach($destinations as $destination)
                                @php

                                    if($destination->status == "trash"){
                                        $i += 1;
                                }
                                @endphp
                            @endforeach
                            @if(count($destinations) == 0 || $count == $i)
                                <br><p align="center">No destination available<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Title</th>
                                    <th>Country</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($destinations as $destination)
                                        @if($destination->status == "published" || $destination->status == "unpublished")
                                            <tr>
                                                <td><a href="{{ route('backend.destination.single.destination', ['destination_slug' => $destination->slug]) }}">{{ $destination->title }}</a></td>
                                                <td>{{ $destination->country->title }}</td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.destination.get.update', ['destination_id' => $destination->id]) }}">Edit</a></button></td>
                                                <td><button class="btn-view"><a href="{{ route('backend.destination.single.destination', ['destination_slug' => $destination->slug])  }}">View</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.destination.trash', ['destination_id' => $destination->id]) }}">Delete</a></button></td>
                                            </tr>
                                         @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $destinations->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($destinations->currentPage() !== 1)
                                    <a href ="{{ $destinations->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($destinations->currentPage() !== $destinations->lastPage() && $destinations->hasPages())
                                    <a href ="{{ $destinations->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
