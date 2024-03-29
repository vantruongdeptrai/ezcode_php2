@extends('layouts.home')
@section('content')
        <div class="container mt-5 bg-education text-light rounded">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-5 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="mt-5">Login</h3>
                    @if (isset($_SESSION["errors"])&&isset($_GET["msg"]))
                    @foreach($_SESSION["errors"] as $errors)
                        <span style="color:red;">{{$errors}}</span><br>
                    @endforeach
                    @endif
                    @if (isset($_SESSION["success"])&&isset($_GET["msg"]))
                        <span style="color:yellow;">{{$_SESSION["success"]}}</span><br>
                    @endif
                    <form action="{{route('user/post-login')}}" class="form-box mt-5" method="post">
                        <div class="row">
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
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
                    </form>
                </div>
            </div>
        </div>
    
@endsection
