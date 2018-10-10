<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
use Storage;
use App\Product;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function listProduct(){
      ['data' => App\Product::all()];
      $data = DB::table('products')->orderBy('created_at', 'desc')->paginate(5);
      return view('admin.listProduct', compact('data'));
    }

    public function addProduct(){

      return view('admin.addProduct');
    }

    public function saveProduct(Request $request){
    	$pro_name = $request->pro_name;
    	$pro_code = $request->pro_code;
    	$pro_price = $request->pro_price;
        $pro_info = $request->pro_info;

        // $product = new Product;
        // if ($request->hasFile('pro_img')) {
        //     $file = $request->file('pro_img');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $path = public_path('/img');
        //     $file->move($path, $filename);

        //     $product->pro_img = $filename;
        // }
        // $product->save();

        if (isset($request->id)) {

        // menupdate data produk
        $id = $request->id;            
        $add_product = DB::table("products")->where('id', $id)->update([
                    'pro_name' => $pro_name,
                    'pro_code' => $pro_code,
                    'pro_price' => $pro_price,
                    // 'pro_img' => 'img.png',
                    'pro_info' => $pro_info,
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);
        }else{
            // memasukan produk baru
            $add_product = DB::table("products")->insert([
                    'pro_name' => $pro_name,
                    'pro_code' => $pro_code,
                    'pro_price' => $pro_price,
                    'pro_info' => $pro_info,
                    'pro_img' => "img.png",
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);
        }

    	if ($add_product) {
    		echo 'done';
    	}else {
    		echo 'error';
    	}
    }

    public function uploadImage(Request $request){
        $this->validate($request, [
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $uploadedImg = $request->file('pic');
        $filename = time() . $uploadedImg->getClientOriginalName();
        $path = public_path().'/img/';
        $id = $request->id;

        $uploadedImg->move($path, $filename);
        $update = DB::table('products')->where('id',$id)->update(['pro_img' => $filename]);

        if ($update) {
            return view('admin.editProduct',[
                'data' => product::where('id', $id)->get()
            ]);
        }else{
            echo 'error';
        }
    }

    /* RestFull API*/
    public function store(Request $request){
        $this->validate($request, [
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product;
        if ($request->hasFile('pro_img')) {
            $file = $request->file('pro_img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('/img');
            $file->move($path, $filename);

            $product->pro_img = $filename;
        }
        $product->save();
        return back()->withInfo('Produk berhasil dibuat..');
    }

    public function destroy(Request $request){

        $products = Product::findOrFail($request->products_id);
        $products->delete();

        return back();
    }
}
