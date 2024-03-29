@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row">
            <h3 class="mt-5" style="text-align:center;">Thousands of courses authored by
                our network of industry experts</h3>
            </div>        
        <div class="row">
            <div class="btn-group">
                <button type="button" class="btn btn-danger">Action</button>
                <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>
        </div>
        <div class="row m-5">
            @foreach($course as $course)
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 mt-5">
                    <div class="card" style="width: 18rem;">
                        <img src="{{route('')."Public/images/".$course->thumbnail}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$course->name}}</h5>
                            <p class="card-text">{{$course->description}}</p>
                            <a href="#" class="btn btn-primary">View detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
