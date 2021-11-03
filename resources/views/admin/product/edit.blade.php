@extends('layouts.admin')
@section('title')
    Edit Product
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Product</h4>
        </div>
        <div class="card_body">
            <form action="{{ url('admin/update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row m-2">
                    <div class="col-md-12 mb-3">
                        <label for="">Category</label>
                        <select class="form-control">
                            <option value="">{{ $product->category->name }}</option>
                          </select>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{ $product->name }}" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{ $product->slug }}" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="3" class="form-control">{{ $product->small_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $product->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" value="{{ $product->original_price }}" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{ $product->selling_price }}" name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" value="{{ $product->tax }}" name="tax">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" value="{{ $product->qty }}" name="qty">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $product->status == "1" ? 'checked' : '' }} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{ $product->trending == "1" ? 'checked' : '' }} name="trending">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" value="{{ $product->meta_title }}" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3"  class="form-control">{{ $product->meta_keywords }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{ $product->meta_description }}</textarea>
                    </div>
                    @if ($product->image)
                        <img src="{{ asset('assets/uploads/product/'.$product->image) }}"  class="size_img" alt="Product Image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form> 
        </div>
    </div>
@endsection