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
                            <h4 class="title">Category Trash</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                @php
                                    $count = 0;
                                    $i = 0;
                                @endphp
                                @foreach($categories as $category)
                                    @php
                                        if($category->status == "trash"){
                                            $i += 1;
                                    }
                                    @endphp
                                @endforeach
                                @if($i == 0)
                                    <p>Nothing in trash</p>
                                @else
                                    <thead class="text-warning">
                                    <th>title</th>
                                    <th>view</th>
                                    <th>deleted by</th>
                                    <th>restore</th>
                                    <th>delete</th>
                                    </thead>

                                    @foreach($categories as $category)
                                        @if($category->status == "trash")
                                            <tbody>
                                            <tr>
                                                <td>{{ $category->title }}</td>
                                                <td>{{ $category->user->name }}</td>
                                                <td><button class="btn-view"><a href="{{ route('backend.category.single.category', ['category_slug' => $category->slug]) }}">View</a></button></td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.category.restore', ['category_id' => $category->id]) }}">Restore</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.category.delete', ['category_id' => $category->id]) }}">Delete</a></button></td>
                                            </tr>
                                            </tbody>
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