@extends('master')

@section('content')

<div class="container">

      <!-- Page Features -->
      <div class="row text-center">
        @foreach ($data as $produk)
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="{{ URL::to('/') }}/img/{{$produk->pro_img}}" alt="">
            <div class="card-body">
              <h5 class="card-title"><a href="post/{{$produk->id}}">{{$produk->pro_name}}</a></h5>
               <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></span>
               <span>{{$produk->pro_code}}</span>
            </div>
            <div class="card-footer">
              <a href="post/{{$produk->id}}" class="btn btn-primary float-left">Bid now!</a>
              <p class="card-text price float-right">${{$produk->pro_price}}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- /.row -->

</div>


@endsection