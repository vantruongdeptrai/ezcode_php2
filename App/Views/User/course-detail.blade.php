@extends('layouts.home')
@section('content')
    
    <div class="container">
        <h1 class="mt-5">Course Detail</h1>
        <div class="row mt-3">            
            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0 mt-5">
                <div class="card" style="width: 18rem;">
                    <img src="{{route('') . "Public/images/" . $course->thumbnail}}" class="card-img-top" alt="..." style="height:200px;">
                        <div class="card-body">
                            <h5 class="card-title">{{$course->name}}</h5>
                                <p class="card-text">{{$course->description}}</p>
                                @if(isset($_SESSION['user']))
                                <form action="{{route('user/join')}}" method="post">
                                    <input type="hidden" name="id_course" value="{{$course->id}}">
                                    <input type="submit" name="join" class="btn btn-primary" value="Join now"></input>
                                </form>
                                @endif
                                @if(!isset($_SESSION['user']))
                                    <p style="color:red">Please login to Join course !</p>
                                @endif
                                
                        </div>
                </div>
            </div>
            <div></div>
        </div>
        <div class="row mt-5">
            @if(isset($_SESSION['user']))
            <h3>Ratting</h3>
            <div class="rating" id="rating">
                <span class="star" value="1" data-rating="1" style="font-size:25px;">&#9733;</span>
                <span class="star" value="2" data-rating="2" style="font-size:25px;">&#9733;</span>
                <span class="star" value="3" data-rating="3" style="font-size:25px;">&#9733;</span>
                <span class="star" value="4" data-rating="4" style="font-size:25px;">&#9733;</span>
                <span class="star" value="5" data-rating="5" style="font-size:25px;">&#9733;</span>
            </div>
            <form action="{{route('user/comment/'. $course->id)}}" method="post">
                <h3 class="mt-5">Comment</h3>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                <input type="submit" name="send" value="Send" class="btn btn-primary mt-3">
                @if (isset($_SESSION["errors"])&&isset($_GET["msg"]))
                    @foreach($_SESSION["errors"] as $errors)
                        <span style="color:red;">{{$errors}}</span><br>
                    @endforeach
                @endif
                @if (isset($_SESSION["success"])&&isset($_GET["msg"]))
                    <span style="color:green;">{{$_SESSION["success"]}}</span><br>
                @endif
            </form>
            @endif
            @if(!isset($_SESSION['user']))
                <span style="color:red;">Please login to rate and comment !</span>
            @endif
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const stars = document.querySelectorAll('.star');
        
        stars.forEach(function(star) {
            star.addEventListener('mouseover', function() {
            let rating = this.getAttribute('data-rating');
            highlightStars(rating);
            });
            
            star.addEventListener('mouseout', function() {
            resetStars();
            });
            
            star.addEventListener('click', function() {
            let rating = this.getAttribute('data-rating');
            alert('Bạn đã đánh giá ' + rating + ' sao.');
            });
        });
        
        function resetStars() {
            stars.forEach(function(star) {
            star.style.color = '#ccc';
            });
        }
        
        function highlightStars(count) {
            for (let i = 0; i < count; i++) {
            stars[i].style.color = 'gold';
            }
        }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.star').click(function() {
                var rating = $(this).data('rating');
                $.ajax({
                type: 'POST',
                url: '{{route('user/ratting/'.$course->id)}}',
                data: { rating: rating},
                success: function(response) {
                    alert('Đã lưu đánh giá ' + rating + ' sao.');
                },
                error: function(xhr, status, error) {
                    alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
                }
                //console.log(url)
                });
                
            });
        });
    </script>

@endsection
