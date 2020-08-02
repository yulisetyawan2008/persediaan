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

Route::get('/barang', 'BarangController@index');
Route::get('/barang/create', 'BarangController@create');
Route::post('/barang', 'BarangController@store');
Route::get('/barang/search', 'BarangController@search');
Route::get('/barang/pdf', 'BarangController@pdf');
Route::get('/barang/excel', 'BarangController@export');
Route::get('/barang/{id}/edit', 'BarangController@edit');
Route::put('/barang/{id}', 'BarangController@update');
Route::delete('/barang/{id}', 'BarangController@destroy');

Route::get('/satuan', 'SatuanController@index');
Route::get('/satuan/create', 'SatuanController@create');
Route::post('/satuan', 'SatuanController@store');
Route::get('/satuan/search', 'SatuanController@search');
Route::get('/satuan/pdf', 'SatuanController@pdf');
Route::get('/satuan/excel', 'SatuanController@export');
Route::get('/satuan/{id}/edit', 'SatuanController@edit');
Route::put('/satuan/{id}', 'SatuanController@update');
Route::delete('/satuan/{id}', 'SatuanController@destroy');

Route::get('/masuk', 'MasukController@index');
Route::get('/masuk/create', 'MasukController@create');
Route::post('/masuk', 'MasukController@store');
Route::get('/masuk/pdf', 'MasukController@pdf');
Route::get('/masuk/excel', 'MasukController@export');
Route::get('/masuk/{id}/edit', 'MasukController@edit');
Route::put('/masuk/{id}', 'MasukController@update');
Route::delete('/masuk/{id}', 'MasukController@destroy');
Route::get('/export/masuk/{dari}/{sampai}', 'LaporanController@export_masuk');

Route::get('/penyedia', 'PenyediaController@index');
Route::get('/penyedia/create', 'PenyediaController@create');
Route::post('/penyedia', 'PenyediaController@store');
Route::get('/penyedia/search', 'PenyediaController@search');
Route::get('/penyedia/pdf', 'PenyediaController@pdf');
Route::get('/penyedia/excel', 'PenyediaController@export');
Route::get('/penyedia/{id}/edit', 'PenyediaController@edit');
Route::put('/penyedia/{id}', 'PenyediaController@update');
Route::delete('/penyedia/{id}', 'PenyediaController@destroy');

Route::get('/tujuan', 'TujuanController@index');
Route::get('tujuan/create', 'TujuanController@create');
Route::post('/tujuan', 'TujuanController@store');
Route::get('/tujuan/search', 'TujuanController@search');
Route::get('/tujuan/pdf', 'TujuanController@pdf');
Route::get('/tujuan/excel', 'TujuanController@export');
Route::get('/tujuan/{id}/edit', 'TujuanController@edit');
Route::put('/tujuan/{id}', 'TujuanController@update');
Route::delete('/tujuan/{id}', 'TujuanController@destroy');

Route::get('/keluar', 'KeluarController@index');
Route::get('/keluar/create', 'KeluarController@create');
Route::post('/keluar', 'KeluarController@store');
Route::get('/keluar/pdf', 'KeluarController@pdf');
Route::get('/keluar/excel', 'KeluarController@export');
Route::get('/keluar/{id}/edit', 'KeluarController@edit');
Route::put('/keluar/{id}', 'KeluarController@update');
Route::delete('/keluar/{id}', 'KeluarController@destroy');

Route::get('/laporan', 'LaporanController@index');
Route::get('/laporan/cari', 'LaporanController@cari');


