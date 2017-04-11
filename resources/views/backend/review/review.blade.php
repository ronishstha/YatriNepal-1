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
                            <h4 class="title">Reviews</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-5">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.review.get.create') }}">Create Review</a>
                                </div>
                            <a href="{{ route('backend.review.delete.page') }}">
                                <i class="material-icons delete col-md-push-4">delete
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
                                        <span class="noti-badge">{{ $i }}</span>
                                    @endif
                                </i>
                            </a>
                            </div>
                            @if(count($reviews) == 0 || $count == $i)
                                <br><p align="center">No review available<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Name</th>
                                    <th>Itinerary</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($reviews as $review)
                                        @if($review->status == "published" || $review->status == "unpublished")
                                            <tr>
                                                <td><a href="{{ route('backend.review.single.review', ['review_slug' => $review->slug]) }}">{{ $review->name}}</a></td>
                                                <td>{{ $review->itinerary->title}}</td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.review.get.update', ['review_id' => $review->id]) }}">Edit</a></button></td>
                                                <td><button class="btn-view"><a href="{{ route('backend.review.single.review', ['review_slug' => $review->slug])  }}">View</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.review.trash', ['review_id' => $review->id]) }}">Delete</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $reviews->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($reviews->currentPage() !== 1)
                                    <a href ="{{ $reviews->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($reviews->currentPage() !== $reviews->lastPage() && $reviews->hasPages())
                                    <a href ="{{ $reviews->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
