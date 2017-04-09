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
                            <h4 class="title">Gallery</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-5">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.gallery.get.create') }}">Create Gallery</a>
                                </div>
                            <a href="{{ route('backend.gallery.delete.page') }}">
                                <i class="material-icons delete col-md-push-4">delete
                                    @php
                                        $count = count($galleries);
                                        $i = 0;
                                    @endphp
                                    @foreach($galleries as $gallery)
                                        @php

                                            if($gallery->status == "trash"){
                                                $i += 1;
                                        }
                                        @endphp
                                    @endforeach
                                    @if($i != 0)
                                        <span class="noti-badge">{{ $i }}</span>
                                    @endif
                                </i>
                            </a>
                            </div>
                            @if(count($galleries) == 0 || $count == $i)
                                <br><p align="center">No gallery available<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Title</th>
                                    <th>Itinerary</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($galleries as $gallery)
                                        @if($gallery->status == "published" || $gallery->status == "unpublished")
                                            <tr>
                                                <td><a href="{{ route('backend.gallery.single.gallery', ['gallery_slug' => $gallery->slug]) }}">{{ $gallery->title }}</a></td>
                                                <td>{{ $gallery->itinerary->title }}</td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.gallery.get.update', ['gallery_id' => $gallery->id]) }}">Edit</a></button></td>
                                                <td><button class="btn-view"><a href="{{ route('backend.gallery.single.gallery', ['gallery_slug' => $gallery->slug])  }}">View</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.gallery.trash', ['gallery_id' => $gallery->id]) }}">Delete</a></button></td>
                                            </tr>
                                         @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $galleries->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($galleries->currentPage() !== 1)
                                    <a href ="{{ $galleries->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($galleries->currentPage() !== $galleries->lastPage() && $galleries->hasPages())
                                    <a href ="{{ $galleries->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
