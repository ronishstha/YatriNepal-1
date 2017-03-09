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

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option>published</option>
                                                <option>unpublished</option>
                                                <option>trash</option>
                                            </select>
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
                                    <a href="{{ route('backend.category.delete.page') }}">
                                        <i class="material-icons delete">delete</i>
                                    </a>
                                    @php
                                        $count = count($categories);
                                        $i = 0;
                                    @endphp
                                    @foreach($categories as $banner)
                                        @php

                                            if($banner->status == "trash"){
                                                $i += 1;
                                        }
                                        @endphp
                                    @endforeach
                                    @if(count($categories) == 0 || $count == $i)
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
                                                @if($category->status == "published" || $category->status == "unpublished")
                                                    <tr>
                                                        <td><a href="{{ route('backend.category.single.category', ['category_id' => $category->id]) }}">{{ $category->title }}</a></td>
                                                        <td><button class="btn-edit"><a href="{{ route('backend.category.get.update', ['category_id' => $category->id]) }}">Edit</a></button></td>
                                                        <td><button class="btn-view"><a href="{{ route('backend.category.single.category', ['category_slug' => $category->slug])  }}">View</a></button></td>
                                                        <td><button class="btn-delete"><a href="{{ route('backend.category.trash', ['category_id' => $category->id]) }}">Delete</a></button></td>
                                                    </tr>
                                                @endif
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
