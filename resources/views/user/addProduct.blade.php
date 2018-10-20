@extends('master')
@section('title', 'add Product')

@section('content')
<script>
  $(document).ready(function(){
    $("#msg").hide();
    $("#btn").click(function(){
      $("#msg").show();
    var pro_name = $("#pro_name").val();
    var pro_code = $("#pro_code").val();
    var pro_price = $("#pro_price").val();
    var pro_info = $("#pro_info").val();
    var token = $("#token").val();
    $.ajax({
      type: "post",
      data: "pro_name=" + pro_name + "&pro_code=" + pro_code + "&pro_price=" + pro_price +"&pro_info=" + pro_info + "&_token=" + token , //mendapatkan input form values
      url: "<?php echo url("/saveProduct") ?>", //action
      success:function(data){
        $("#msg").html("<p class='alert alert-success'>Product has been inserted</p>");
        $("#msg").fadeOut(2000);
        $('#pro_name').val(''); //menghapus value setelah disubmit
        $('#pro_code').val(''); //menghapus value setelah disubmit
        $('#pro_price').val(''); //menghapus value setelah disubmit
        $('#pro_info').val(''); //menghapus value setelah disubmit
      },
       error: function(data) {
        $("#msg").html("<p class='alert alert-danger'>The input field is required.</p>");
      }
    });

  });
    
  
});
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h2>Add Product</h2>
                  <p id="msg" ></p>
                </div>
                <div class="card-body">
                    <input type="hidden" value="{{csrf_token()}}" id="token"/>
                    <div class="form-group">
                      <label for="pro_name">Product Name</label>
                      <input type="text" id="pro_name" class="form-control" placeholder="Saya akan menjual Domain TLD"/>
                    </div>
                    <div class="form-group">
                      <label for="pro_code">Product Code</label>
                      <input type="text" id="pro_code" class="form-control" placeholder="Domain" />
                    </div>
                    <div class="form-group">
                      <label for="pro_price">Product Price</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" id="pro_price" class="form-control" placeholder="99000" />
                        <span class="input-group-text">.00</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="pro_info">Deskripsi</label>
                      <textarea type="text" id="pro_info" class="form-control"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success upload-image" value="Submit" id="btn" />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
