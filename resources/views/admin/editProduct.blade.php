@extends('master')
@section('title', 'Admin')

@section('content')
<script>
  $(document).ready(function(){
    $("#msg").hide();
    $("#btn").click(function(){
      $("#msg").show();
    var pro_name = $("#pro_name").val();
    var pro_code = $("#pro_code").val();
    var pro_price = $("#pro_price").val();
    var token = $("#token").val();
    var id = $("#id").val();

    $.ajax({
      type: "post",
      data: "id=" + id + "&pro_name=" + pro_name + "&pro_code=" + pro_code + "&pro_price=" + pro_price + "&_token=" + token,
      url: "<?php echo url("/admin/saveProduct") ?>",
      success:function(data){
        $("#msg").html("Product has been updated");
        $("#msg").fadeOut(2000);
      }
    });
  });
  
});
</script>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                 <div class="card">
                  <div class="card-header"><h2 align="center">Product image</h2></div>
                  <div class="card-body">
                    <div class="content" align="center">
                      <img src="{{ URL::to('/') }}/img/{{$data[0]->pro_img}}" alt="" width="100%" />
                  </div> 
                  <div class="card-footer" align="center">
                  <a href="{{ url('admin/changeImage') }}/{{$data[0]->id}}" class="btn btn-fill btn-primary">Change image</a>
                  </div>
                    </div>
                 </div>
            </div>

            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                <div class="content">
                  <h2>Update Product</h2>
                  <p id="msg" class="alert alert-success"></p>
                  <input type="hidden" value="{{$data[0]->id}}" id="id"/>
                  <br>
                  <input type="hidden" value="{{csrf_token()}}" id="token"/>
                    <label>Product Name</label>
                    <input type="text" id="pro_name" value="{{$data[0]->pro_name}}" class="form-control" />
                    <br>
                    <label>Product Code</label>
                    <input type="text" id="pro_code" value="{{$data[0]->pro_code}}" class="form-control" />
                    <br>
                    <label>Product Price</label>
                    <input type="number" id="pro_price" value="{{$data[0]->pro_price}}" class="form-control" />
                    <br>

                    <input type="submit" class="btn btn-success" value="Submit" id="btn" />
                </div>
                </div>
              </div>
            </div>
                
        </div>

        
    </div>
</div>


@endsection