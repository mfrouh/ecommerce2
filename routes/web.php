<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware'=>['auth','role:admin']], function () {
   Route::get('/product/forcedelete/{id}','Admin\ProductController@forcedelete');
   Route::get('/product/restore/{id}','Admin\ProductController@restore');
   Route::get('/product/deleteproducts','Admin\ProductController@deleteproducts');

   Route::get('/category/forcedelete/{id}','Admin\CategoryController@forcedelete');
   Route::get('/category/restore/{id}','Admin\CategoryController@restore');
   Route::get('/category/deletecategories','Admin\CategoryController@deletecategories');

   Route::get('/attribute/forcedelete/{id}','Admin\AttributeController@forcedelete');
   Route::get('/attribute/restore/{id}','Admin\AttributeController@restore');
   Route::get('/attribute/deleteattributes','Admin\AttributeController@deleteattributes');

   Route::get('/valueable/forcedelete/{id}','Admin\valueableController@forcedelete');
   Route::get('/valueable/restore/{id}','Admin\valueableController@restore');
   Route::get('/valueable/deletevalueables','Admin\valueableController@deletevalueables');
   Route::get('/valueable/create/{product}','Admin\valueableController@create');

   Route::get('/offer/forcedelete/{id}','Admin\OfferController@forcedelete');
   Route::get('/offer/restore/{id}','Admin\OfferController@restore');
   Route::get('/offer/deleteoffers','Admin\OfferController@deleteoffers');
   Route::get('/offer/create/{product}','Admin\OfferController@create');

   Route::resource('category','Admin\CategoryController');
   Route::resource('product','Admin\ProductController');
   Route::resource('attribute','Admin\AttributeController');
   Route::resource('valueable','Admin\valueableController');
   Route::resource('offer','Admin\OfferController');
   Route::get('/offer/create',function(){
       return abort('404');
   });
   Route::get('/valueable/create',function(){
    return abort('404');
  });
   Route::get('/dashboard','Admin\PagesController@dashboard');
   Route::get('/clients','Admin\PagesController@clients');
   Route::get('/orders','Admin\PagesController@orders');
   Route::get('/order_details/{id}','Admin\PagesController@order_details');
   Route::get('/value','Admin\PagesController@value');
   Route::get('/tag','Admin\PagesController@tag');

});
Route::group(['middlewire'=>['']], function () {

 });
