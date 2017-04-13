@extends('backend.layouts.index')
@section('content')
    <style>
        .btn-edit{
            background-color: dodgerblue;
            border: none;
            border-radius: 3px;
            height: 25px;
        }
        .btn-edit a{
            color: ghostwhite;
        }
        .btn-delete{
            background-color: #e53935;
            border: none;
            border-radius: 3px;
            height: 25px;
        }
        .btn-delete a{
            color: ghostwhite;
        }
        .single-button{
            width: 100px;
            margin-left:auto;
            margin-right: auto;
        }
    </style>
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title" align="center">{{ ucfirst($team->name) }} | Last modified by: {{ $team->user->name }}</h4>
                            <p class="category" align="center">Last updated on
                                    {{ $team->updated_at }}
                            </p>
                        </div>
                        <div class="card-content table-responsive">
                            <p align="center">{{ $team->title }}  </p>
                            @if(!empty($team->facebook))
                                <p align="center">Facebook: {{ $team->facebook }} </p>
                            @endif
                            @if(!empty($team->twitter))
                                <p align="center">Twitter: {{ $team->twitter }} </p>
                            @endif
                            @if(!empty($team->google_plus))
                                <p align="center">Google Plus: {{ $team->google_plus }} </p>
                            @endif
                            @if(!empty($team->instagram))
                                <p align="center">Instagram: {{ $team->instagram }} </p>
                            @endif
                            @if(!empty($team->rss))
                                <p align="center">Rss: {{ $team->rss }} </p>
                            @endif
                            <p align="center">{!! $team->description !!}</p>
                            @if(!empty($team->image))
                                @if(file_exists(public_path(). '/team/' . $team->image))
                                    <section class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <img src="{{ URL::asset('team/' . $team->image) }}" alt="" class="img-responsive">
                                        </div>
                                    </section><br>
                                @endif
                            @endif

                            <div class="single-button">
                            <button class="btn-edit"><a href="{{ route('backend.team.get.update', ['team_id' => $team->id]) }}">Edit</a></button>
                            <button class="btn-delete"><a href="{{ route('backend.team.trash', ['team_id' => $team->id]) }}">Delete</a></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection