@extends('layouts.admin')
@section('title')
    Details
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Details
                            <a href="{{ url('admin/settings') }}" class="btn btn-success btn-sm float-right">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Fist Name</label>
                                    <input type="text" name="name" class="form-control" disabled value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Last Name</label>
                                    <input type="text" name="lname" class="form-control" disabled value="{{ $user->lname }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" name="email" class="form-control" disabled value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Phone</label>
                                    <input type="number" name="phone" class="form-control" disabled value="{{ $user->phone }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Address 1</label>
                                    <input type="text" name="address1" class="form-control" disabled value="{{ $user->address1 }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Address 2</label>
                                    <input type="text" name="address2" class="form-control" disabled value="{{ $user->address2 }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">City</label>
                                    <input type="text" name="city" class="form-control" disabled value="{{ $user->city }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Country</label>
                                    <input type="text" name="country" class="form-control" disabled value="{{ $user->country }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Postal Code</label>
                                    <input type="number" name="zipcode" class="form-control" disabled value="{{ $user->zipcode }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection