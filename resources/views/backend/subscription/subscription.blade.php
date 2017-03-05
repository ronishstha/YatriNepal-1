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
                            <h4 class="title">Subscription</h4>
                            <p class="category"></p>
                        </div>

                        <div class="card-content table-responsive">
                            @if(count($destinations) == 0)
                                <br><p align="center">No subscribers yet<p>
                            @else
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Title</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Suscribed at</th>
                                    </thead>
                                    <tbody>
                                    @foreach($subscriptions as $subscription)
                                        <tr>
                                            <td>{{ $subscription->title }}</td>
                                            <td>{{ $subscription->cuser->name }}</td>
                                            <td>{{ $subscription->cuser->email }}</td>
                                            <td>{{ $subscription->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            @endif
                            {!! $destinations->links() !!}
                            {{--<div class="pagination">--}}

                                {{--@if($destinations->currentPage() !== 1)
                                    <a href ="{{ $destinations->previousPageUrl() }}" class="paginate"><span class="fa fa-caret-left"></span></a>
                                @endif
                                @if($destinations->currentPage() !== $destinations->lastPage() && $destinations->hasPages())
                                    <a href ="{{ $destinations->nextPageUrl()}}"  class="paginate"><span class="fa fa-caret-right"></span></a>
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
