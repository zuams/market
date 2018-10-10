@extends('master')
@section('title', 'User')
  
@section('content')

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" align="center">
                            
                          <div class="content">
                            <h2>Change Image</h2>
                           <form action="{{ URL::to('/admin/editProduct') }}" role="form" enctype="multipart/form-data" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{request()->route('id')}}" />
                            <br>
                            <input type="file" name="pic" />
                            <br>
                            
                            <div class="footer">
                            <input type="submit" value="upload" class="btn btn-fill btn-primary" />   
                           </div>
                           </div>
                         </form>
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