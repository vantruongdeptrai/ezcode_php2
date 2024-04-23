@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manage Categories</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Name Course</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ratting as $rate)
                        <tr>
                            <td>{{$rate->id}}</td>
                            <td>{{$rate->username}}</td>
                            <td>{{$rate->name}}</td>
                            <td>{{$rate->value}}</td>
                            <td>
                                <a href="" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-circle "><i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-danger btn-circle"><i class="fas fa-fw fa-wrench"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection