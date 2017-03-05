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
                            <h4 class="title">Countries</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.country.get.create') }}">Create Country</a><br/>
                            @if(count($countries) == 0)
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
                                    <tr>
                                        <td>{{ $country->title }}</td>
                                        <td>-</td>
                                        <td><button class="btn-edit"><a href="{{ route('backend.country.get.update', ['country_id' => $country->id]) }}">Edit</a></button></td>
                                        <td><button class="btn-delete"><a href="{{ route('backend.country.delete', ['country_id' => $country->id]) }}">Delete</a></button></td>
                                        <td>{{ $country->user->name }}</td>
                                    </tr>
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
