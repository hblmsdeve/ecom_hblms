@extends('layouts.admin')
@section('title')
    Users
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Registered customers <p class="float-right border">total of customers : {{ $users->count() }}</p></h4>
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
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name .' '.$item->lname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            @if ($item->role_as == 0)
                            <span class="badge bg-primary">Customer</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/customers/'.$item->id) }}" class="btn btn-primary btn-sm">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    </div>
@endsection