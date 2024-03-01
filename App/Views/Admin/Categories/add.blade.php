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
                                <h1 class="h4 text-gray-900 mb-4">Create new categories</h1>
                            </div>
                            <form action="" class="user" id="form" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="Name Category" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" placeholder="Description"
                                            name="description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input type="file" class="form-control form-control-user" placeholder="Thumbnail"
                                        name="thumbnail">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" placeholder="Status"
                                            name="status">
                                    </div>
                                </div>
                                <input type="submit" name="add" class="btn btn-primary btn-user btn-block "
                                    value="Create">
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