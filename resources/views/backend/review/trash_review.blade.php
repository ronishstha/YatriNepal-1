@extends('backend.layouts.index')

@section('style')
    <link href="{{ URL::asset('/assets/css/table.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    @if(Session::has('success'))
        <section class="info-box fail">
            {{ Session::get('success') }}
        </section>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title">Review Trash</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">

                                @php
                                    $count = count($reviews);
                                    $i = 0;
                                @endphp
                                @foreach($reviews as $review)
                                    @php

                                        if($review->status == "trash"){
                                            $i += 1;
                                    }
                                    @endphp
                                @endforeach
                                @if($i != 0)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{{ route('backend.review.restore.all') }}" style="color:black">
                                                <i class="material-icons">restore_page</i>
                                                Restore all
                                            </a>
                                        </div>

                                        <div class="col-md-3 col-md-push-5">
                                            <a href="{{ route('backend.review.delete.all') }}" style="color:black">
                                                <i class="material-icons">delete</i>
                                                Delete all
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @php
                                    $count = 0;
                                    $i = 0;
                                @endphp
                                @foreach($reviews as $review)
                                    @php
                                        if($review->status == "trash"){
                                            $i += 1;
                                    }
                                    @endphp
                                @endforeach
                                @if($i == 0)
                                    <p>Nothing in trash</p>
                                @else
                                    <thead class="text-warning">
                                    <th>name</th>
                                    <th>view</th>
                                    <th>deleted by</th>
                                    <th>restore</th>
                                    <th>delete</th>
                                    </thead>

                                    @foreach($reviews as $review)
                                        @if($review->status == "trash")
                                            <tbody>
                                            <tr>
                                                <td>{{ $review->name }}</td>
                                                <td>{{ $review->user->name }}</td>
                                                <td><button class="btn-view"><a href="{{ route('backend.review.single.review', ['review_slug' => $review->slug]) }}">View</a></button></td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.review.restore', ['review_id' => $review->id]) }}">Restore</a></button></td>
                                                <td>
                                                    <button class="btn-delete" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Confirm Delete" data-message="Are you sure you want to delete this?" style="color:white">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Delete Permanently</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure about this ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-danger" id="confirm"><a href="{{ route('backend.review.delete', ['review_id' => $review->id]) }}" style="color:white">Delete</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                 @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection