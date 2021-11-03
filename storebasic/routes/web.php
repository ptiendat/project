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
Route::get('/login','LoginController@index')->name('login')->middleware('checklogout');
Route::post('/login','LoginController@login');
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'checklogin'],function()
{

    Route::get('/logout','AdminController@logout')->name('logout');

    Route::get('/','AdminController@index')->name('admin');
    Route::group(['prefix'=>'user','namespace'=>'User'],function(){
        Route::get('/','UserController@index')->name('user.index');
        Route::get('/add','UserController@add')->name('user.add');
        Route::post('/store','UserController@store')->name('user.store');
        Route::get('/edit/{id}','UserController@edit')->name('user.edit');
        Route::post('/update/{id}','UserController@update')->name('user.update');
        Route::get('/delete/{id}','UserController@delete')->name('user.delete');
    });
    Route::group(['prefix'=>'product','namespace'=>'Product'],function(){
        Route::get('/','ProductController@index')->name('product.index');
        Route::get('/add','ProductController@add')->name('product.add');
        Route::post('/store','ProductController@store')->name('product.store');
        Route::get('/edit/{id}','ProductController@edit')->name('product.edit');
        Route::post('/update/{id}','ProductController@update')->name('product.update');
        Route::get('/delete/{id}','ProductController@delete')->name('product.delete');
    });
    Route::group(['prefix'=>'category','namespace'=>'Category'],function(){
        Route::get('/','CategoryController@index')->name('category.index');
        Route::get('/edit/{id}','CategoryController@edit')->name('category.edit');
        Route::post('/add','CategoryController@add')->name('category.add');
        Route::post('/update/{id}','CategoryController@update')->name('category.update');
        Route::get('/delete/{id}','CategoryController@delete')->name('category.delete');
    });
    Route::group(['prefix'=>'order','namespace'=>'Order'],function(){
        Route::get('/','OrderController@order')->name('order.order');
        Route::get('/detailorder/{id}','OrderController@detailorder')->name('order.detail');
        Route::get('/processed','OrderController@processed')->name('order.processed');
        Route::get('/process/{id}','OrderController@process')->name('order.process');
    });
});
Route::group(['prefix'=>'site','namespace'=>'Site'],function(){
    Route::get('/','SiteController@index')->name('site');
    Route::get('/contact','SiteController@contact')->name('site.contact');
    Route::get('/about','SiteController@about')->name('site.about');
    Route::group(['namespace'=>'Cart'],function(){
        Route::get('/cart','CartController@cart')->name('site.cart');
        Route::get('/addtocart','CartController@addtocart')->name('site.addtocart');
        Route::get('/checkout','CartController@checkout')->name('site.checkout');
        Route::post('/postcheckout','CartController@postcheckout')->name('site.postcheckout');
        Route::get('/complete/{orderId}','CartController@complete')->name('site.complete');
        Route::get('/delete/{rowId}','CartController@delete')->name('site.cart.delete');
    });
    Route::group(['namespace'=>'Product'],function(){
        Route::get('/detail/{id}','ProductController@detail')->name('site.detail');
        Route::get('/shop','ProductController@shop')->name('site.shop');
        Route::post('/filter','ProductController@filter')->name('site.filter');
        Route::get('/filter_id/{id}','ProductController@filter_id')->name('site.filter_id');
    });
});