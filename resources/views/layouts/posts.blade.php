@extends('master')
@section('content')
<div class="container">
  <div class="row float-center">
        <div class="col-lg-7">
          @foreach ($product as $post)
          <div class="card">
            <img class="card-img-top" src="{{ URL::to('/') }}/img/{{$post->pro_img}}" alt="">
            <div class="card-body">
              <h3 class="card-title">{{$post->pro_name}}</h3>
              <h4>Rp.{{$post->pro_price}}</h4>
              <p class="card-text">{{$post->pro_info}}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 rightsidebar">
          <div class="mb-3 rounded">
            <button class="btn btn-info btn-block mb-3">Buy now</button>
            <div class="card p-3">
            <img width="100" height="100" src="http://shozus.com/assets/images/avatar-lg.jpg" class="float-left rounded" alt="">
            <h4 class="pt-2">{{$post->pro_code}}</h4>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            <div class="card-footer">
              <a href="#" class="btn btn-block btn-success"><span class="glyphicon glyphicon-comment"></span> Contact seller</a>
            </div>
          </div>
          </div>
        </div>
        @endforeach
  </div>
</div>
    <!-- /.container -->
  @endsection