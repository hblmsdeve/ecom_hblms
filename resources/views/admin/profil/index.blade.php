@extends('layouts.admin')
@section('title')
    Settings
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Admins
                @if(Auth::user()->role_as == '1')
                <a href="{{ url('admin/settings/add') }}" class="btn btn-success float-right btn-sm">ADD</a>
                @endif
            </h4>
            <hr>
        </div>
        <div class="card_body m-1">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name .' '.$item->lname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            @if ($item->role_as == 1)
                            <span class="badge bg-danger">Admin</span>
                            @else
                            <span class="badge bg-warning">Author</span>
                            @endif
                        </td>
                        <td>
                            @if (Auth::id() == $item->id)    
                            @else
                            <a href="{{ url('admin/settings/details/'.$item->id) }}" class="btn btn-primary btn-sm">Details</a>
                            @if(Auth::user()->role_as == '1')
                            <a href="{{ url('admin/settings/delete/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $admins->links() }}
    </div>
@endsection