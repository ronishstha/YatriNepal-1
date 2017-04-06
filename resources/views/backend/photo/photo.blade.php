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
                            <h4 class="title">Photo</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-5">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.photo.get.create') }}">Add Photo</a>
                                </div>
                            <a href="{{ route('backend.photo.delete.page') }}">
                                <i class="material-icons delete col-md-push-4">delete
                                    @php
                                        $count = count($photos);
                                        $i = 0;
                                    @endphp
                                    @foreach($photos as $photo)
                                        @php

                                            if($photo->status == "trash"){
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
                            @if(count($photos) == 0 || $count == $i)
                                <br><p align="center">No photo available<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Photo</th>
                                    <th>Gallery</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($photos as $photo)
                                        @if($photo->status == "published" || $photo->status == "unpublished")
                                            <tr>
                                                <td><img src="{{ URL::asset('gallery/' . $photo->gallery->title . '/' . $photo->image) }}" style="height:100px;width:100px;border-radius:3px"></td>
                                                <td>{{ $photo->gallery->title }}</td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.photo.get.update', ['photo_id' => $photo->id]) }}">Edit</a></button></td>
                                                <td><button class="btn-view"><a href="{{ route('backend.photo.single.photo', ['photo_id' => $photo->id])  }}">View</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.photo.trash', ['photo_id' => $photo->id]) }}">Delete</a></button></td>
                                            </tr>
                                         @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $photos->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($photos->currentPage() !== 1)
                                    <a href ="{{ $photos->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($photos->currentPage() !== $photos->lastPage() && $photos->hasPages())
                                    <a href ="{{ $photos->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
