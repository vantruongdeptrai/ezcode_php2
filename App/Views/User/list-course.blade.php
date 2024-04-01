@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row">
            <h3 class="mt-5" style="text-align:center;">Thousands of courses authored by
                our network of industry experts</h3>
        </div>        
        <div class="container ms-5">
            <h3 class="mt-5">Filter course</h3>
            
                <form action="{{route('user/filter')}}" method="post">
                    <div class="row">
                        <div class="col-3">
                            <input type="number" name="price" id="" min="0" class="form-control" placeholder="Price">
                        </div>
                        <div class="col-3">
                            <select name="id_category" id="" class="form-select">
                                <option value="">-- Category --</option>
                                <option value="2">Back-end</option>
                                <option value="1">Font-end</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <input type="submit" name="submit" class="btn btn-primary" value="Filter"></input>
                        </div>
                    </div>
                </form>    
        </div>
        <div class="row m-5">
            @foreach($course as $course)
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 mt-5">
                    <div class="card" style="width: 18rem;">
                        <img src="{{route('')."Public/images/".$course->thumbnail}}" class="card-img-top" alt="..." style="height:200px;">
                        <div class="card-body">
                            <h5 class="card-title">{{$course->name}}</h5>
                            <p class="card-text">{{$course->description}}</p>
                            <a href="{{route('user/course-detail/'.$course->id)}}" class="btn btn-primary">View detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
