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
                            <h4 class="title">Countries</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.country.get.create') }}">Create Country</a>
                            <a href="{{ route('backend.country.delete.page') }}">
                                <i class="material-icons delete">delete
                                    @php
                                        $count = count($countries);
                                        $i = 0;
                                    @endphp
                                    @foreach($countries as $country)
                                        @php

                                            if($country->status == "trash"){
                                                $i += 1;
                                        }
                                        @endphp
                                    @endforeach
                                    @if($i != 0)
                                        <span class="noti-badge">{{ $i }}</span>
                                    @endif
                                </i>
                            </a>
                            @if(count($countries) == 0 || $count == $i)
                                <br><p align="center">No country available<p>
                            @else
                            <table class="table">
                                <thead class="text-primary">
                                <th>Title</th>
                                <th>Flag</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Modified by</th>
                                </thead>
                                <tbody>

                                @foreach($countries as $country)
                                    @if($country->status == "published" || $country->status == "unpublished")
                                        <tr>
                                            <td>{{ $country->title }}</td>
                                            <td>
                                                @if(Storage::disk('country')->has($country->flag))
                                                    <img src="{{ route('backend.country.image', ['filename' => $country->flag]) }}" alt="" class="img-responsive" style="border-radius: 2px;height:20px;width:20px;">
                                                @endif

                                                </td>
                                            <td><button class="btn-edit"><a href="{{ route('backend.country.get.update', ['country_id' => $country->id]) }}">Edit</a></button></td>
                                            <td><button class="btn-delete"><a href="{{ route('backend.country.trash', ['country_id' => $country->id]) }}">Delete</a></button></td>
                                            <td>{{ $country->user->name }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>

                            </table>
                            @endif
                            {!! $countries->links() !!}
                            <div class="pagination">

                            {{--@if($country->currentPage() !== 1)
                                <a href ="{{ $country->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                            @endif
                            @if($country->currentPage() !== $country->lastPage() && $country->hasPages())
                                <a href ="{{ $country->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
