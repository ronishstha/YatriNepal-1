@extends('backend.layouts.index')

@section('style')
    <link href="{{ URL::asset('/assets/css/table.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    @if(Auth::user()->id == 1)
        @if(Session::has('success'))
            <section class="info-box fail">
                {{ Session::get('success') }}
            </section>
        @endif
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="purple">
                                <h4 class="title">Users</h4>
                                <p class="category"></p>
                            </div>

                            <div class="card-content table-responsive">
                                @if(count($users) == 1)
                                    <br><p align="center">No other users available<p>
                                @else
                                    <table class="table">
                                        <thead class="text-primary">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Delete</th>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            @if($user->id != 1)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <button class="btn-delete" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Confirm Delete" data-message="Are you sure you want to delete this?" style="color:white">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
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
                                <button type="button" class="btn btn-danger" id="confirm"><a href="{{ route('backend.user.delete', ['user_id' => $user->id]) }}" style="color:white">Delete</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                                        </tbody>

                                    </table>
                                @endif
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
    @endif
@endsection