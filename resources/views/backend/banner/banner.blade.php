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
        .btn-view{
            background-color: forestgreen;
            border: none;
            border-radius: 3px;
            height: 25px;
        }
        .btn-view a{
            color: ghostwhite;
        }
        .pagination{
            margin-left: 550px;
        }
        .create{
            margin-left: 510px;
        }
        .paginate{
            color:black;
            font-size:25px;
        }

    </style>
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
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.banner.get.create') }}">Create Banner</a><br>
                            @if(count($banners) == 0)
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
                                        <tr>
                                            <td><a href="{{ route('backend.banner.single.banner', ['banner_id' => $banner->id]) }}">{{ $banner->title }}</a></td>
                                            <td><button class="btn-edit"><a href="{{ route('backend.banner.get.update', ['banner_id' => $banner->id]) }}">Edit</a></button></td>
                                            <td><button class="btn-view"><a href="{{ route('backend.banner.single.banner', ['banner_id' => $banner->id])  }}">View</a></button></td>
                                            <td><button class="btn-delete"><a href="{{ route('backend.banner.delete', ['banner_id' => $banner->id]) }}">Delete</a></button></td>
                                        </tr>
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
