@extends('master')
@section('title', 'Admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <table class="table table-hover table-striped" >
              <thead>
              <tr>
              <th><b>Jumlah gigs: {{App\product::count()}}</b><th>
              {{-- <td><a href="{{ url('admin/addProduct') }}" class="btn btn-info">Add new</a><td>  --}}
              </tr>
              <tr align="center">
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Price</th>
                  <th>Images</th>
                  <th>Action</th>
             </tr>
              </thead>
              <tbody>
              @foreach($data as $products)
                <tr>
                  <td>{{$products->pro_name}}</td>
                  <td>{{$products->pro_code}}</td>
                  <td>{{$products->pro_price}}</td>
                  <td>{{$products->pro_img}}</td>
                  <td><a class="btn btn-fill btn-primary" href="{{url('/admin/editProduct')}}/{{$products->id}}">Edit</a> <a class="btn btn-fill btn-danger" data-toggle="modal" data-catid="{{$products->id}}" href="#{{$products->id}}-hapus">Hapus</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        {{$data->links()}}
        </div>
      </div>
    </div>
  </div>
</div>

@foreach($data as $products)
<!-- modal hapus -->
<div class="modal modal-danger fade" id="{{$products->id}}-hapus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          </div>
        <form action="{{ route('products.destroy', $products->id) }}" method="post">
        {{method_field('delete')}}
        {{ csrf_field() }}
        <div class="modal-body">
          <p class="text-center">Apakah kamu yakin untuk hapus ini?</p>
           <input type="hidden" name="products_id" id="cat_id" value="{{$products->id}}">
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">batal</button>
          <button type="submit" class="btn btn-warning">Ya, hapus</button>
        </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
@endsection
