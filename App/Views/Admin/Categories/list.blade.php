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
                            <th>Name</th>
                            <th>Thumbnail</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $cate)
                        <tr>
                            <td>{{$cate->id}}</td>
                            <td>{{$cate->name}}</td>
                            <td><img src="../../Public/images/{{$cate->thumbnail}}" alt="" height='80' width='80'></td>
                            <td>{{$cate->description}}</td>
                            <td>{{$cate->status}}</td>
                            <td>
                                <a href="{{route('admin/categories/delete-categories/'.$cate->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-circle "><i class="fas fa-trash"></i></a>
                                <a href="{{route('admin/categories/form-update/'.$cate->id)}}" class="btn btn-danger btn-circle"><i class="fas fa-fw fa-wrench"></i></a>
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