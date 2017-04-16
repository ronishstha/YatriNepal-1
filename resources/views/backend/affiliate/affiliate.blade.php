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
                            <h4 class="title">Affiliates</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-5">
                            <i class="material-icons create">note_add</i>
                            <a href="{{ route('backend.affiliate.get.create') }}">Add Affiliate</a>
                                </div>
                            <a href="{{ route('backend.affiliate.delete.page') }}">
                                <i class="material-icons delete col-md-push-4">delete
                                    @php
                                        $count = count($affiliates);
                                        $i = 0;
                                    @endphp
                                    @foreach($affiliates as $affiliate)
                                        @php

                                            if($affiliate->status == "trash"){
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
                            @if(count($affiliates) == 0 || $count == $i)
                                <br><p align="center">No affiliate available<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($affiliates as $affiliate)
                                        @if($affiliate->status == "published" || $affiliate->status == "unpublished")
                                            <tr>
                                                <td><a href="{{ route('backend.affiliate.single.affiliate', ['affiliate_slug' => $affiliate->slug]) }}">{{ $affiliate->title }}</a></td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.affiliate.get.update', ['affiliate_id' => $affiliate->id]) }}">Edit</a></button></td>
                                                <td><button class="btn-view"><a href="{{ route('backend.affiliate.single.affiliate', ['affiliate_slug' => $affiliate->slug])  }}">View</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.affiliate.trash', ['affiliate_id' => $affiliate->id]) }}">Delete</a></button></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $affiliates->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($affiliates->currentPage() !== 1)
                                    <a href ="{{ $affiliates->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($affiliates->currentPage() !== $affiliates->lastPage() && $affiliates->hasPages())
                                    <a href ="{{ $affiliates->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
