@extends('layouts.home')
@section('content')
<div class="container">
<div class="container mt-5">
  <div class="row">
    <div class="col-md-8">
      <h2 class="mb-4">Khóa học của tôi</h2>
      @foreach($myCourse as $c)
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">{{$c->name}}</h5>
            <p class="card-text">{{$c->description}}</p>
            <a href="#" class="btn btn-primary">Xem khóa học</a>
          </div>
        </div>
      @endforeach
      <!-- Thêm các khóa học khác nếu cần -->
    </div>
    <div class="col-md-4">
      <h2 class="mb-4">Liên hệ</h2>
      <p>Để biết thêm thông tin hoặc đăng ký khóa học, vui lòng liên hệ:</p>
      <ul class="list-group">
        <li class="list-group-item">Email: example@email.com</li>
        <li class="list-group-item">Số điện thoại: 0123 456 789</li>
      </ul>
    </div>
  </div>
</div>
</div>
@endsection