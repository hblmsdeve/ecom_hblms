@extends('layouts.admin')
@section('title')
    Add Slider
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Slider</h4>
        </div>
        <div class="card_body">
            <form action="{{ url('admin/insert-slider') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row m-2">
                    <div class="col-md-6  mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Link</label>
                        <input type="text" class="form-control" name="link">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending">
                    </div>
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