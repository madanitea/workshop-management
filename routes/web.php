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

Route::get('/', 'PagesController@index');
Route::get('login', 'PagesController@login');
Route::post('login', 'PagesController@proseslogin');
Route::get('dashboard', 'AdminController@index');

// RESTful Penjualan
Route::post('jual','PenjualanController@store');
Route::get('jual','PenjualanController@show');
Route::delete('jual/{jual}','PenjualanController@destroy');
Route::post('jual/addsparepart','PenjualanController@addsparepart');
Route::get('jual/detail/{id}','PenjualanController@jualdetail');
Route::get('jual/{id}/detail','PenjualanController@total_harga');
Route::delete('jual/detail/{id}','PenjualanController@jualdetail_destroy');
Route::post('jual/selesai','PenjualanController@selesai');
Route::get('riwayat/penjualan','PenjualanController@riwayat_jual');
// Route::delete('riwayat/jual/{id}','PenjualanController@riwayat_servis_delete');

// RESTful Servis
Route::post('servis','ServisController@store');
Route::get('servis','ServisController@show');
Route::delete('servis/{servis}','ServisController@destroy');
Route::post('servis/addsparepart','ServisController@addsparepart');
Route::get('servis/detail/{id}','ServisController@servisdetail');
Route::get('servis/{id}/detail','ServisController@total_harga');
Route::delete('servis/detail/{id}','ServisController@servisdetail_destroy');
Route::post('servis/selesai','ServisController@selesai');
Route::get('riwayat/servis','ServisController@riwayat_servis');
Route::delete('riwayat/servis/{id}','ServisController@riwayat_servis_delete');

Route::get('api/sparepart', 'SparepartController@get');

// RESTful Sparepart
Route::post('sparepart','SparepartController@store');
Route::get('sparepart', 'SparepartController@show');
Route::delete('sparepart/{sparepart}','SparepartController@destroy');
Route::patch('sparepart/{sparepart}','SparepartController@update');
Route::get('sparepart/tambah', 'SparepartController@create');

// RESTful Peralatan 
Route::post('tools', 'PeralatanController@store');
Route::get('tools', 'PeralatanController@show');
Route::delete('tools/{tool}','PeralatanController@destroy');
Route::patch('tools/{tool}','PeralatanController@update');
Route::get('tools/tambah', 'PeralatanController@create');