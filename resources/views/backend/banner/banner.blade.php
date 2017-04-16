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
                            <h4 class="title">Banners</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-5">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.banner.get.create') }}">Create Banner</a>
                                </div>
                            <a href="{{ route('backend.banner.delete.page') }}">
                                <i class="material-icons delete col-md-push-4">delete
                                    @php
                                        $count = count($banners);
                                        $i = 0;
                                    @endphp
                                    @foreach($banners as $banner)
                                        @php

                                            if($banner->status == "trash"){
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
                            @if(count($banners) == 0 || $count == $i)
                                <br><p align="center">No banner available<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($banners as $banner)
                                        @if($banner->status == "published" || $banner->status == "unpublished")
                                            <tr>
                                                <td><a href="{{ route('backend.banner.single.banner', ['banner_slug' => $banner->slug]) }}">{{ $banner->title }}</a></td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.banner.get.update', ['banner_id' => $banner->id]) }}">Edit</a></button></td>
                                                <td><button class="btn-view"><a href="{{ route('backend.banner.single.banner', ['banner_slug' => $banner->slug])  }}">View</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.banner.trash', ['banner_id' => $banner->id]) }}">Delete</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $banners->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($banners->currentPage() !== 1)
                                    <a href ="{{ $banners->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($banners->currentPage() !== $banners->lastPage() && $banners->hasPages())
                                    <a href ="{{ $banners->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
