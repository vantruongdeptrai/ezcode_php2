@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manage Course</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->description}}</td>
                            <td><img src="../../Public/images/{{$course->thumbnail}}" alt="" height='80' width='80'></td>
                            <td>{{$course->status}}</td>
                            <td>
                                <a href="{{route('admin/courses/delete-courses/'.$course->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-circle "><i class="fas fa-trash"></i></a>
                                <a href="{{route('admin/courses/form-courses/'.$course->id)}}" class="btn btn-danger btn-circle"><i class="fas fa-fw fa-wrench"></i></a>
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