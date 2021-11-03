@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">request_quote</i>
              </div>
              <p class="card-category">Total Revenue</p>
              <h4 class="card-title">{{ $totalRevenue }} DH</h4>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">store</i>
                </div>
                <p class="card-category">Total Sales</p>
                <h4 class="card-title">{{ $totalSales }}</h4>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">update</i> Just Updated
                </div>
              </div>
            </div>
          </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">price_check</i>
              </div>
              <p class="card-category">Today Revenue</p>
              <h4 class="card-title">{{ $todayRevenue }} DH</h4>
            </div>
            <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">update</i> Just Updated
                </div>
              </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">shopping_cart</i>
              </div>
              <p class="card-category">Today Sales</p>
              <h4 class="card-title">{{ $todaySale }}</h4>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="card">
        <div class="card-header">
            <h4>Latest Order</h4>
            <hr>
        </div>
        <div class="card_body m-1">
            <table class="table table-bordered table-striped">
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
                    @foreach ($orders as $order)
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
        {{ $orders->links() }}
    </div>
@endsection