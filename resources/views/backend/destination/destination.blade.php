@extends('backend.layouts.index')

@section('style')
    <link href="{{ URL::asset('/assets/css/table.css') }}" rel="stylesheet"/>
@endsection

@section('content')
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
                            <a href="{{ route('backend.destination.get.create') }}">Create Destination</a><br>
                            @if(count($destinations) == 0)
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
                                        <tr>
                                            <td><a href="{{ route('backend.destination.single.destination', ['destination_id' => $destination->id]) }}">{{ $destination->title }}</a></td>
                                            <td>{{ $destination->country->title }}</td>
                                            <td><button class="btn-edit"><a href="{{ route('backend.destination.get.update', ['destination_id' => $destination->id]) }}">Edit</a></button></td>
                                            <td><button class="btn-view"><a href="{{ route('backend.destination.single.destination', ['destination_slug' => $destination->slug])  }}">View</a></button></td>
                                            <td><button class="btn-delete"><a href="{{ route('backend.destination.delete', ['destination_id' => $destination->id]) }}">Delete</a></button></td>
                                        </tr>
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
