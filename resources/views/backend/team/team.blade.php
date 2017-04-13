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
                            <h4 class="title">Teams</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-5">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.team.get.create') }}">Create Team</a>
                                </div>
                            <a href="{{ route('backend.team.delete.page') }}">
                                <i class="material-icons delete col-md-push-4">delete
                                    @php
                                        $count = count($teams);
                                        $i = 0;
                                    @endphp
                                    @foreach($teams as $team)
                                        @php

                                            if($team->status == "trash"){
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
                            @if(count($teams) == 0 || $count == $i)
                                <br><p align="center">No team available<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($teams as $team)
                                        @if($team->status == "published" || $team->status == "unpublished")
                                            <tr>
                                                <td><a href="{{ route('backend.team.single.team', ['team_id' => $team->id]) }}">{{ $team->name }}</a></td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.team.get.update', ['team_id' => $team->id]) }}">Edit</a></button></td>
                                                <td><button class="btn-view"><a href="{{ route('backend.team.single.team', ['team_id' => $team->id])  }}">View</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.team.trash', ['team_id' => $team->id]) }}">Delete</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $teams->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($teams->currentPage() !== 1)
                                    <a href ="{{ $teams->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($teams->currentPage() !== $teams->lastPage() && $teams->hasPages())
                                    <a href ="{{ $teams->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
