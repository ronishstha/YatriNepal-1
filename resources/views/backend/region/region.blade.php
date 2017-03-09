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
                            <h4 class="title">Regions</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.region.get.create') }}">Create Region</a>
                            <a href="{{ route('backend.region.delete.page') }}">
                                <i class="material-icons delete">delete</i>
                            </a>
                            @php
                                $count = count($regions);
                                $i = 0;
                            @endphp
                            @foreach($regions as $region)
                                @php

                                    if($region->status == "trash"){
                                        $i += 1;
                                }
                                @endphp
                            @endforeach
                            @if(count($regions) == 0 || $count == $i)
                                <br><p align="center">No region available<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Title</th>
                                    <th>Destination</th>
                                    <th>Last modified by</th>
                                    <th>modified date</th>
                                    <th>Edit</th>
                                    <th>Trash</th>
                                    </thead>
                                    <tbody>
                                    @foreach($regions as $region)
                                        @if($region->status == "published" || $region->status == "unpublished")
                                            <tr>
                                                <td>{{ $region->title }}</td>
                                                <td>{{ $region->destination->title }}</td>
                                                <td>{{ $region->user->name }}</td>
                                                <td>{{ $region->updated_at }}</td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.region.get.update', ['region_id' => $region->id]) }}">Edit</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.region.trash', ['region_id' => $region->id]) }}">Delete</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $regions->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($regions->currentPage() !== 1)
                                    <a href ="{{ $regions->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($regions->currentPage() !== $regions->lastPage() && $regions->hasPages())
                                    <a href ="{{ $regions->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
