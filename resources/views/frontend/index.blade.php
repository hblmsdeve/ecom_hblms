@extends('layouts.front')

@section('title')
    Welcome to our shop
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="container px-4 px-lg-5 mt-5">
        <h5 class="fw-bolder mb-4 alert bg-dark text-white">Featured produducts</h5>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($featured_products as $prod)
            <div class="col mb-5">
                <div class="card h-100 product_data">
                    <input type="hidden" value="{{ $prod->id }}" class="prod_id" name="prod_id">
                    <input type="hidden" value="1" class="qte-input">
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$prod->category->name}}</div>
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
                            <a href="{{ url('category/'.$prod->category->slug.'/'.$prod->slug) }}" class="btn btn-outline-dark mt-auto btn-sm">Show</a>
                            @if ($prod->qty > 0)
                            <button class="btn btn-outline-dark mt-auto addToCart-btn btn-sm float-end" >Add to cart</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $featured_products->links() }}
    </div>
@endsection
@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection