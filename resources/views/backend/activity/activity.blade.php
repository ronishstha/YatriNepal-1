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
                            <h4 class="title">Activities</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-5">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.activity.get.create') }}">Create Activity</a>
                                </div>
                            <a href="{{ route('backend.activity.delete.page') }}">
                                <i class="material-icons delete col-md-push-4">delete
                                    @php
                                        $count = count($activities);
                                        $i = 0;
                                    @endphp
                                    @foreach($activities as $activity)
                                        @php

                                            if($activity->status == "trash"){
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
                            @if(count($activities) == 0 || $count == $i)
                                <br><p align="center">No Activity available<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Title</th>
                                    <th>Region</th>
                                    <th>Last modified by</th>
                                    <th>modified date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($activities as $activity)
                                        @if($activity->status == "published" || $activity->status == "unpublished")
                                            <tr>
                                                <td>{{ $activity->title }}</td>
                                                <td>{{ $activity->region->title }}</td>
                                                <td>{{ $activity->user->name }}</td>
                                                <td>{{ $activity->updated_at }}</td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.activity.get.update', ['activity_id' => $activity->id]) }}">Edit</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.activity.trash', ['activity_id' => $activity->id]) }}">Delete</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $activities->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($activities->currentPage() !== 1)
                                    <a href ="{{ $activities->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($activities->currentPage() !== $activities->lastPage() && $activities->hasPages())
                                    <a href ="{{ $activities->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
