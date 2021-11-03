@extends('layouts.front')

@section('title')
    {{ $category->name }}
@endsection

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}">
                    Collections
                </a>/
                <a href="{{ url('category/'.$category->slug) }}">
                    {{ $category->name }}
                </a>
                
            </h6>
        </div>
    </div>
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">{{ $category->name }}</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($products as $prod)
                <div class="col mb-5">
                    <div class="card h-100 product_data">
                        <input type="hidden" value="{{ $prod->id }}" class="prod_id" name="prod_id">
                        <input type="hidden" value="1" class="qte-input">
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{ $prod->category->name }}</div>
                        <img class="card-img-top" src="{{ asset('assets/uploads/product/'.$prod->image) }}" alt="..." />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">{{ $prod->name }}</h5>
                                <span class="text-muted text-decoration-line-through">{{ $prod->original_price }}</span>
                                {{ $prod->selling_price }}
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a href="{{ url('category/'.$category->slug.'/'.$prod->slug) }}" class="btn btn-outline-dark mt-auto btn-sm">Show</a>
                                @if ($prod->qty > 0)
                                <button class="btn btn-outline-dark mt-auto addToCart-btn btn-sm float-end" >Add to cart</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
@endsection