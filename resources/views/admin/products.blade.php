
<table style="width:100%" class="table table-hover table-striped" >

@foreach($data as $products)
  <tr  style="height:50px">
    <td style="padding:10px">{{$products->pro_name}}</td>
    <td style="padding:10px">{{$products->pro_code}}</td>
    <td style="padding:10px">{{$products->pro_price}}</td>
    <td><a class="btn btn-sm btn-fill btn-primary" href="{{url('/admin/editProduct')}}/{{$products->id}}">Edit</td>
  </tr>
  
@endforeach
</table>
