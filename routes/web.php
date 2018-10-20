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

Route::get('/home', 'HomeController@index')->name('user.master');

//products
Route::view('/products', 'layouts.myProducts', ['data' => App\Product::all()]);
Route::get('/post/{id}', 'UserController@showProduct');

//user middleware start
Route::group(['prefix' => '', 'middleware' => ['auth']], function () {
    Route::get('/home','UserController@index');
    Route::get('profile','UserController@profile');
    Route::get('addProduct','UserController@addProduct');
    Route::post('saveProduct','UserController@saveProduct');

    Route::view('addProduct', 'user.addProduct',[
    	'data' => App\Product::all()
    ]);
    Route::get('listProduct','UserController@listProduct');
    Route::get('editProduct/{id}',function($id){
       return view('user.editProduct',[
            'data' => App\Product::where('id', $id)->get()
       ]); 
    });
    
    Route::post('editProduct', 'UserController@uploadImage');
    Route::resource('products', 'UserController')->only([
        'destroy', 'store'
    ]);
    //ubah gambar
    Route::view('changeImage/{id}', 'user.changeImage');
    
    Route::view('manage', 'user.manage', [
        'data' => App\User::all()
    ]);
});

