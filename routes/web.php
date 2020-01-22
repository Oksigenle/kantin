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

Route::get('/', function () {
    return view('welcome');
});
 
Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/produks', 'ProdukController');
Route::get('/cari', 'ProdukController@cari')->name('cari');
Route::get('/produk/{id}/tambah', 'ProdukController@tambah')->name('produk.tambah');
Route::match(['put', 'patch'],'/produk/{id}/tambah', 'ProdukController@tambahan')->name('produk.tambahan');

Route::resource('/laporans', 'LaporanController');
Route::get('/filters', 'LaporanController@filter')->name('filters');
Route::get('/caris', 'LaporanController@cari')->name('caris');
Route::get('export','LaporanController@export');




