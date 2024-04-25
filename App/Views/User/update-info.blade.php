@extends('layouts.home')
@section('content')
        <div class="container mt-5 bg-education text-light rounded">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-5 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="mt-5">Update infomation</h3>
                    @if (isset($_SESSION["errors"])&&isset($_GET["msg"]))
                    @foreach($_SESSION["errors"] as $errors)
                        <span style="color:red;">{{$errors}}</span><br>
                    @endforeach
                    @endif
                    @if (isset($_SESSION["success"])&&isset($_GET["msg"]))
                        <span style="color:yellow;">{{$_SESSION["success"]}}</span><br>
                    @endif

                    <form action="{{route('user/post-info')}}" class="form-box mt-5" method="post" enctype="multipart/form-data">
                        @if(isset($_SESSION['user']))
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" placeholder="Email" name="email" disabled value="{{$_SESSION['user']['email']}}">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" placeholder="Username" name="username" value="{{$_SESSION['user']['username']}}">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" placeholder="Fullname" name="fullname" value="{{$_SESSION['user']['fullname']}}">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="date" class="form-control" placeholder="Date of birth" name="dob" value="{{$_SESSION['user']['dob']}}">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" placeholder="Phone number" name="tel" value="{{$_SESSION['user']['tel']}}">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{$_SESSION['user']['address']}}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="control control--checkbox">
                                    <span class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked" />
                                    <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="col-12 mb-5 mt-3">
                                    <input type="submit" name="submit" value="Submit" class="btn bg-success text-light">
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
@endsection
