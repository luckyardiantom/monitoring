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

//Home
Route::get('/home', 'HomeController@index')->name('home');

//Barcode
// Route::get('/barcode', 'BarcodeController@index')->name('barcode');
Route::resource('/barcode', 'BarcodeController');


//Produk
Route::resource('/produk', 'ProdukController');


//DB tmi-database

//Transaksi

Route::resource('/transaksi', 'TransaksiController');
// Route::get('/transaksi/{nilai}', 'TransaksiController@detail');

//Detail
// Route::get('/detail', 'DetailController');

//failed_jobs
Route::resource('/failed', 'FailedController');


//PB
Route::get('/permintaan  ', 'permintaanController@index');

//Produk
Route::resource('/master_plu', 'MasterController');

//Prodmas
Route::resource('/prodmast', 'ProdmastController');

//Logs
Route::resource('/log', 'LogController');


//Permintaan
Route::resource('/permintaan', 'PermintaanController');

//mArgin
Route::resource('/margin', 'MarginController');


//Maping prd
Route::resource('/maping', 'MapingController');
//Route::post('mapingupdate','MapingController@update');
 // Route::get('/maping', 'MapingController@index');
Route::get('/maping/edit/{id}', 'MapingController@edit');
Route::post('/maping/edit/{id}/proses', 'MapingController@proses_edit');
Route::post('/filtercabang', 'MapingController@filter');

//Maping plu
//Route::resource('/plu', 'PluController');
Route::resource('/plu', 'PluController');
Route::get('/plu/edit/{id}', 'PluController@edit');
Route::post('/plu/edit/{id}/proses', 'PluController@proses_edit');
Route::post('/filtercabang1', 'PluController@filter');



// //Permintaan
// Route::resource('/maping', 'MapingController');
