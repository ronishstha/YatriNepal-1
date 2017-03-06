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
                            <h4 class="title">Activities</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.activity.get.create') }}">Create Activity</a><br>
                            @if(count($activities) == 0)
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
                                        <tr>
                                            <td>{{ $activity->title }}</td>
                                            <td>{{ $activity->region->title }}</td>
                                            <td>{{ $activity->user->name }}</td>
                                            <td>{{ $activity->updated_at }}</td>
                                            <td><button class="btn-edit"><a href="{{ route('backend.activity.get.update', ['activity_id' => $activity->id]) }}">Edit</a></button></td>
                                            <td><button class="btn-delete"><a href="{{ route('backend.activity.delete', ['activity_id' => $activity->id]) }}">Delete</a></button></td>
                                        </tr>
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
