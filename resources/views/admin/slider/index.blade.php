@extends('layouts.admin')
@section('title')
    Sliders
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Slider</h4>
        </div>
        <hr>
        <div class="card_body m-1">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>price</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Trending</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->description }}</td>
                        <td>{{ $slider->price }}</td>
                        <td>{{ $slider->link }}</td>
                        <td>
                            @if($slider->status == 1)
                            <span class="badge bg-success">Activé</span>
                            @else
                            <span class="badge bg-danger">Désactivé</span>
                            @endif
                        </td>
                        <td>
                            @if($slider->trending == 1)
                            <span class="badge bg-success">1 ère</span>
                            @else
                            <span class="badge bg-info">2 ème</span>
                            @endif
                        </td>
                        <td>
                            <img src="{{ asset('assets/uploads/slider/'.$slider->image) }}" class="cate-image" alt="Image here">
                        </td>
                        <td>
                            <a href="{{ url('admin/edit-slider/'.$slider->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('admin/delete-slider/'.$slider->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $sliders->links() }}
    </div>
@endsection