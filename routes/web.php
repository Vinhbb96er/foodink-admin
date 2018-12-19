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

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    
    Route::resource('store', 'StoreController');
    Route::resource('shipper', 'ShipperController');
    Route::resource('shipper-order', 'ShipperOrderController');
});

Route::group(['namespace' => 'Ajax'], function () {
    Route::post('/ajax/block-store', 'StoreController@blockManyStore')->name('store.block_many_store');
    Route::post('/ajax/active-store', 'StoreController@activeManyStore')->name('store.active_many_store');

    Route::post('/ajax/block-shipper', 'ShipperController@blockManyShipper')->name('shipper.block_many_shipper');
    Route::post('/ajax/active-shipper', 'ShipperController@activeManyShipper')->name('shipper.active_many_shipper');
});