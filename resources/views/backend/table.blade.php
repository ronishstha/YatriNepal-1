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
                                    <td><button class="btn-view"><a href="{{ route('backend.singlepage', ['page_id' => $page->id])  }}">View</a></button></td>
                                    <td><button class="btn-delete"><a href="{{ route('backend.page.delete', ['page_id' => $page->id]) }}">Delete</a></button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
