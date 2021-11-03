@extends('layouts.admin')
@section('title')
    Add Admin
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add Admin
                            <a href="{{ url('admin/settings') }}" class="btn btn-success btn-sm float-right">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/settings/update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="email" name="email" class="form-control typeahead">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Privilege</label>
                                        <select class="form-control" name="privilege">
                                            <option value="0">User</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Author</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">ADD</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection