<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/', function () {
    	return view('layouts.main');
	});

Route::get('/home', 'HomeController@index')->name('admin.master');

//products
Route::view('/products', 'admin.myProducts', ['data' => App\Product::all()]);


//admin middleware start
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/','AdminController@index');
    Route::get('profile','AdminController@profile');
    Route::get('addProduct','AdminController@addProduct');
    Route::post('saveProduct','AdminController@saveProduct');

    Route::view('addProduct', 'admin.addProduct',[
    	'data' => App\Product::all()
    ]);
    Route::get('listProduct','AdminController@listProduct');
    Route::get('editProduct/{id}',function($id){
       return view('admin.editProduct',[
            'data' => App\Product::where('id', $id)->get()
       ]); 
    });
    
    Route::post('editProduct', 'AdminController@uploadImage');
    Route::resource('products', 'AdminController')->only([
        'destroy', 'store'
    ]);
    //ubah gambar
    Route::view('changeImage/{id}', 'admin.changeImage');
    
    Route::view('manage', 'admin.manage', [
        'data' => App\User::all()
    ]);
});

