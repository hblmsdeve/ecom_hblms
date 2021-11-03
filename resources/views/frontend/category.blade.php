@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
    <div class="py-3 mb-2 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}">
                    Collections
                </a>
            </h6>
        </div>
    </div>

    {{-- <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Categories</h2>
                    <div class="row">
                        @foreach ($category as $cate)
                            <div class="col-md-3 mb-3">
                                <a href="{{ url('category/'.$cate->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/category/'.$cate->image) }}" alt="Category Image">
                                        <div class="card-body">
                                            <h6>{{ $cate->name }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container px-4 px-lg-5 mt-3">
        <h2 class="fw-bolder mb-4">All Categories</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($category as $cate)
            <div class="col mb-5">
                <div class="card h-100 product_data">
                    <img class="card-img-top" src="{{ asset('assets/uploads/category/'.$cate->image) }}" alt="Category Image" />
                    <div class="card-body p-1">
                        <div class="text-center">
                            <h5 class="fw-bolder">{{ $cate->name }}</h5>
                        </div>
                    </div>
                    <div class="card-footer p-2 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a href="{{ url('category/'.$cate->slug) }}" class="btn btn-outline-dark mt-auto">Show</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $category->links() }}
    </div>
@endsection