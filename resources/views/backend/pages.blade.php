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
                            <h4 class="title">Pages</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <i class="material-icons">note_add</i><a href="{{ route('backend.create') }}">Create Page</a>
                            @if(count($pages) == 0)
                                <p>No pages available<p>
                            @else
                            <table class="table">
                                <thead class="text-primary">
                                <th>Title</th>
                                <th>Page</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <td><a href="{{ route('backend.singlepage', ['page_id' => $page->id]) }}">{{ $page->title }}</a></td>
                                        <td>{{ $page->page }}</td>
                                        <td><button class="btn-edit"><a href="{{ route('backend.get.update', ['page_id' => $page->id]) }}">Edit</a></button></td>
                                        <td><button class="btn-view"><a href="{{ route('backend.singlepage', ['page_slug' => $page->slug/*, 'page_id' => $page->id*/])  }}">View</a></button></td>
                                        <td><button class="btn-delete"><a href="{{ route('backend.page.delete', ['page_id' => $page->id]) }}">Delete</a></button></td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            @endif
                            {!! $pages->links() !!}
                            <div class="pagination">

                            {{--@if($pages->currentPage() !== 1)
                                <a href ="{{ $pages->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                            @endif
                            @if($pages->currentPage() !== $pages->lastPage() && $pages->hasPages())
                                <a href ="{{ $pages->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
