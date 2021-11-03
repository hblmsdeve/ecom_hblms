@extends('layouts.admin')
@section('title')
    Edit Slider
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Slider</h4>
        </div>
        <div class="card_body">
            <form action="{{ url('admin/update-slider/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row m-2">
                    <div class="col-md-6  mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price" value="{{ $slider->price }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Link</label>
                        <input type="text" class="form-control" name="link" value="{{ $slider->link }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $slider->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{ $slider->status == "1" ? 'checked' : '' }} >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending" {{ $slider->trending == "1" ? 'checked' : '' }} >
                    </div>
                    @if ($slider->image)
                        <img src="{{ asset('assets/uploads/slider/'.$slider->image) }}"  class="size_img" alt="Product Image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form> 
        </div>
    </div>
@endsection