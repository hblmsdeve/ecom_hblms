@extends('layouts.front')

@section('title')
    Wishlist
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a>/
                <a href="{{ url('wishlist') }}">
                    Wishlist
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                @if($wishlist->count() > 0)
                    @foreach ($wishlist as $item)
                        <div class="row product_data" id="id{{ $item->prod_id }}">
                            <div class="col-md-2 my-auto">
                                <img src="{{ asset('assets/uploads/product/'.$item->products->image) }}" width="70px" height="70px" alt="Image here">
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->products->name }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->products->selling_price }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if($item->products->qty > 0)
                                <label for="Quatity">Quantity</label>
                                <div class="input-group size-qte text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" disabled value="1" class="form-control qte-input text-center">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                                @else
                                    <h6>Out of Stock</h6>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                @if ($item->products->qty > 0)
                                <button class="btn btn-success addToCart-btn"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger delete-wishlist-item"><i class="fa fa-trash"></i> Remove</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4>There are no products in your wishlist</h4>
                @endif
            </div>
        </div>
    </div>
@endsection