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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Produk
Route::get('/product','Tokoku\ProductController@index')->name('pdIndex');
Route::get('/product/create','Tokoku\ProductController@create')->name('pdCreate');
Route::get('/product/edit/{id}','Tokoku\ProductController@edit')->name('pdEdit');
Route::post('/product/store','Tokoku\ProductController@store')->name('pdStore');
Route::put('/product/update/{id}','Tokoku\ProductController@update')->name('pdUpdate');
Route::delete('/product/delete','Tokoku\ProductController@delete')->name('pdDelete');

//Gudang
Route::get('/warehouse','Tokoku\WhController@index')->name('whIndex');
Route::get('/warehouse/create','Tokoku\WhController@create')->name('whCreate');
Route::get('/warehouse/edit/{id}','Tokoku\WhController@edit')->name('whEdit');
Route::post('/warehouse/store','Tokoku\WhController@store')->name('whStore');
Route::put('/warehouse/update/{id}','Tokoku\WhController@update')->name('whUpdate');
Route::delete('/warehouse/delete','Tokoku\WhController@delete')->name('whDelete');

//Periode
Route::get('/periode','Tokoku\PeriodeController@index')->name('periodeIndex');
Route::get('/periode/create','Tokoku\PeriodeController@create')->name('periodeCreate');
Route::get('/periode/edit/{id}','Tokoku\PeriodeController@edit')->name('periodeEdit');
Route::post('/periode/store','Tokoku\PeriodeController@store')->name('periodeStore');
Route::put('/periode/update/{id}','Tokoku\PeriodeController@update')->name('periodeUpdate');
Route::delete('/periode/delete','Tokoku\PeriodeController@delete')->name('periodeDelete');

//Transaksi
Route::get('/transaction','Tokoku\TrController@index')->name('trIndex');
Route::get('/transaction/create','Tokoku\TrController@create')->name('trCreate');
Route::post('/transaction/store','Tokoku\TrController@store')->name('trStore');
Route::delete('/transaction/delete','Tokoku\TrController@delete')->name('trDelete');

//Stok Opname
Route::get('/stockopname','Tokoku\SoController@index')->name('soIndex');
Route::get('/stockopname/create','Tokoku\SoController@create')->name('soCreate');
Route::get('/stockopname/edit/{id}','Tokoku\SoController@edit')->name('soEdit');
Route::post('/stockopname/store','Tokoku\SoController@store')->name('soStore');
Route::put('/stockopname/update/{id}','Tokoku\SoController@update')->name('soUpdate');
Route::delete('/stockopname/delete','Tokoku\SoController@delete')->name('soDelete');

//Laporan Stok
Route::get('/stockreport','Tokoku\WsController@index')->name('wsIndex');

//Ubah Sandi
Route::get('/password','Tokoku\PasswordController@index')->name('passwordChange');
Route::post('/password/update','Tokoku\PasswordController@update')->name('passwordChanged');
