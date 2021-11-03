@extends('layouts.admin')
@section('title')
    Orders
@endsection
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">New Orders
                        <a href="{{ url('admin/order-history') }}" class="btn btn-warning float-right">Order History</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Tracking Number</th>
                                <th>status</th>
                                <th>Total Price</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as  $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->fname.' '.$order->lname }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->tracking_no }}</td>
                                <td>
                                  @if ($order->status == 1)
                                  <span class="badge bg-success">Delivered</span>
                                  @else
                                  <span class="badge bg-warning">Pending</span>
                                  @endif
                                </td>
                                <td>{{ $order->total_price }} DH</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="{{ url('admin/view-order/'.$order->id) }}" class="btn btn-primary btn-sm">Details</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $orders->links() }}
        </div>
    </div>
@endsection