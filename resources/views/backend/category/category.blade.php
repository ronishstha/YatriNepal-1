@extends('backend.layouts.index')

@section('style')
    <link href="{{ URL::asset('/assets/css/table.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Create Category</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.category.create') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" value="{{ Request::old('title') }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Description</label>
                                            <textarea row=20 class="form-control" name="description" id="description" value="{{ Request::old('description') }}"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Create</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title">Category</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content">
                                <div class="card-content table-responsive">
                                    @if(count($categories) == 0)
                                        <br><p align="center">No category available<p>
                                    @else
                                        <table class="table">
                                            <thead class="text-primary">
                                            <th>Title</th>
                                            <th>Edit</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td><a href="{{ route('backend.category.single.category', ['category_id' => $category->id]) }}">{{ $category->title }}</a></td>
                                                    <td><button class="btn-edit"><a href="{{ route('backend.category.get.update', ['category_id' => $category->id]) }}">Edit</a></button></td>
                                                    <td><button class="btn-view"><a href="{{ route('backend.category.single.category', ['category_slug' => $category->slug])  }}">View</a></button></td>
                                                    <td><button class="btn-delete"><a href="{{ route('backend.category.delete', ['category_id' => $category->id]) }}">Delete</a></button></td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    @endif
                                    {!! $categories->links() !!}
                                    {{--<div class="pagination">--}}

                                    {{--@if($categories->currentPage() !== 1)
                                        <a href ="{{ $categories->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                    @endif
                                    @if($categories->currentPage() !== $categories->lastPage() && $categories->hasPages())
                                        <a href ="{{ $categories->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
                                        @endif--}}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
