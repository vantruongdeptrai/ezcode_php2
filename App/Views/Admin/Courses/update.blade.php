@extends('layouts.admin')
@section('content')
<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update course</h1>
                            </div>
                            @if (isset($_SESSION["errors"])&&isset($_GET["msg"]))
                                @foreach($_SESSION["errors"] as $errors)
                                    <span style="color:red;">{{$errors}}</span><br>
                                @endforeach
                            @endif
                            @if (isset($_SESSION["success"])&&isset($_GET["msg"]))
                                    <span style="color:green;">{{$_SESSION["success"]}}</span><br>
                            @endif
                            <form action="{{route('admin/courses/update-courses/'.$courses->id)}}" class="user" id="form" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="Name Category" name="name" value="{{$courses->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="Price" name="price" value="{{$courses->price}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" placeholder="Description"
                                            name="description" value="{{$courses->description}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="file" class="form-control form-control-user" placeholder="Thumbnail"
                                        name="thumbnail" value="{{$courses->thumbnail}}">
                                    </div>
                                </div>                    
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select name="status" id="" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" name="update" class="btn btn-primary btn-user btn-block "
                                    value="Update">
                                <input type="reset" class="btn btn-primary btn-user btn-block" value="Reload">
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
