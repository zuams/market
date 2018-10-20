<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
use Auth;
use Storage;
use App\Product;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function profile(){
        return view('user.profile');
    }

    public function showProduct($id){
        $product = Product::all()->where('id',$id); 
        return view('layouts.posts')->withProduct($product);   
    }

    public function listProduct(){
      ['data' => App\Product::all()];
      $id_user = Auth::user()->id;
      $data = DB::table('products')->orderBy('created_at', 'desc')->where('id_user', $id_user)->paginate(5);

      return view('user.listProduct', compact('data', 'id_user'));
    }

    public function addProduct(){

      return view('user.addProduct');
    }

    public function saveProduct(Request $request){
    	$pro_name = $request->pro_name;
    	$pro_code = $request->pro_code;
    	$pro_price = $request->pro_price;
        $pro_info = $request->pro_info;

        $user_id = Auth::user()->id;
        if (isset($request->id)) {

        // menupdate data produk
        $id = $request->id;
        $add_product = DB::table("products")->where('id', $id)->update([
                    'pro_name' => $pro_name,
                    'pro_code' => $pro_code,
                    'pro_price' => $pro_price,
                    //'pro_img' => 'img.png',
                    'pro_info' => $pro_info,
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);
        }else{
            // $uploadedImg = $request->file('pic');
            // $filename = time() . $uploadedImg->getClientOriginalName();
            // $path = public_path().'/img/';
            // $id = $request->id;

            // $uploadedImg->move($path, $filename);
            // memasukan produk baru
            $add_product = DB::table("products")->insert([
                    'id_user' => $user_id,
                    'pro_name' => $pro_name,
                    'pro_code' => $pro_code,
                    'pro_price' => $pro_price,
                    'pro_info' => $pro_info,
                    'pro_img' => "none image",
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
            return view('user.editProduct',[
                'data' => product::where('id', $id)->get()
            ]);
        }else{
            echo 'error';
        }
    }

    public function destroy(Request $request){

        $products = Product::findOrFail($request->products_id);
        $products->delete();

        return back();
    }
}
