@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row">
            <h3 class="mt-5" style="text-align:center;">Thousands of courses authored by
                our network of industry experts</h3>
        </div>        
        <div class="container ms-5">
            <h3 class="mt-5">Filter course</h3>
            <div class="row">
                <form action="{{route('user/filter')}}" method="post" class="row">
                    <div class="col-3">
                        <select name="price" id="price" class="form-select">
                            <option value="">-- Price --</option>
                            <option value="1">0 - 10.000 VNĐ</option>
                            <option value="2">10.000 - 50.000 VNĐ</option>
                            <option value="3">50.000 - 100.000 VNĐ</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <select name="category" id="category" class="form-select">
                            <option value="">-- Category --</option>
                            <option value="2">Back-end</option>
                            <option value="1">Font-end</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="submit" name="filter" value="Filter" class="btn btn-primary">
                    </div>
                </form>
            </div>     
        </div>
        <div>
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
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Bắt sự kiện khi thay đổi các lựa chọn
            $('#price, #category').change(function(){
                var price = $('#price').val();
                var category = $('#category').val();
                
                // Gửi yêu cầu Ajax
                $.ajax({
                    url: '{{route('user/filter/')}}',
                    method: 'POST',
                    data: {price: price, category: category},
                    success: function(response){
                        $('#course-list').html(response);
                    }
                });
            });
        });
    </script>
@endsection
