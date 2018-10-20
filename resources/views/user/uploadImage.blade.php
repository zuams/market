@extends('master')
@section('title', 'User')

@section('content')

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="text-align:center;">                         
                            <div class="content">
                                <h2>Product image</h2>
                                <div class="card">
                                <img src="{{ url('public/img') }}/{{$data[0]->pro_img}}"  width="100%" />
                                </div>
                            </div>
                            <div class="footer">
                                    <a href="{{ url('/user/changeImage') }}/{{$data[0]->id}}" class="btn btn-fill btn-primary">change image</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            
                            <div class="content">
                           <p> Fusce quis dictum erat, ornare mattis quam. Pellentesque eget ipsum hendrerit, feugiat risus lacinia, accumsan eros. In fringilla volutpat elementum. Integer volutpat ex ut pharetra auctor. Vivamus turpis arcu, sollicitudin id est nec, imperdiet consectetur sapien. Integer quis volutpat velit, id auctor leo</p>
                                <div class="footer">
                                <p>Donec congue eleifend sapien, in molestie diam vulputate sit amet</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>


@endsection