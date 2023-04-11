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
    return redirect('/login');
});
Route::get('/testing', [App\Http\Controllers\TestingController::class, 'index'])->name('testing');
Route::get('/home', 'HomeController@index');
// voucher
Route::get('/voucher', 'VoucherController@index');
Route::get('/save-voucher', 'VoucherController@save');

Route::get('/voucher/add', 'VoucherController@voucher');
Route::get('/voucher/store', 'VoucherController@store');
Route::get('/voucher/destroy', 'VoucherController@destroy');
Route::get('/voucher/edit/{id}', 'VoucherController@edit');
Route::post('/voucher/update', 'VoucherController@update');
Route::post('/voucher/disable/{id', 'VoucherController@disable');
Route::post('/voucher/enable/{id}', 'VoucherController@enable');


// Hotspot

Route::get('/user', 'UserController@index');

Route::get('tambah-user', 'UserController@add');
Route::post('/hotspot/user/store', 'UserController@store');
Route::post('/hotspot/user/quick', 'UserController@quick');
Route::get('/hotspot/user/remove/{id}', 'UserController@destroy');
Route::get('/hotspot/user/disable/{id}', 'UserController@disable');
Route::get('/hotspot/user/enable/{id}', 'UserController@enable');
Route::get('user-aktif', 'UserController@useraktif');
Route::get('user-all', 'UserController@userall');



#log
Route::get('/log', 'LogController@log');

//ppoe
Route::get('/ppoe', 'PpoeController@index');
Route::get('/hotspot/ppoe/add', 'PpoeController@add');
Route::get('/hotspot/ppoe/edit/{id}', 'PpoeController@edit');
Route::post('/hotspot/ppoe/update', 'PpoeController@update');
Route::post('/hotspot/ppoe/store', 'PpoeController@store');
Route::post('/hotspot/ppoe/quick', 'PpoeController@quick');
Route::get('/hotspot/ppoe/remove/{id}', 'PpoeController@destroy');
Route::get('/hotspot/ppoe/disable/{id}', 'PpoeController@disable');
Route::get('/hotspot/ppoe/enable/{id}', 'PpoeController@enable');
//queue
Route::get('/queue', 'QueueController@index');
Route::get('/hotspot/queue/add', 'QueueController@add');
Route::get('/hotspot/queue/edit/{id}', 'QueueController@edit');
Route::post('/hotspot/queue/update', 'QueueController@update');
Route::post('/hotspot/queue/store', 'QueueController@store');
Route::get('/hotspot/queue/remove/{id}', 'QueueController@destroy');
Route::get('/hotspot/queue/disable/{id}', 'QueueController@disable');
Route::get('/hotspot/queue/enable/{id}', 'QueueController@enable');

//traffic
Route::get('/traffic', 'TrafficController@index');
Route::get('/data','TrafficController@data');
Route::get('/data2','TrafficController@data2');
Route::get('/data3','TrafficController@data3');
//rebbot
Route::get('/rebbot', 'RebootController@index');
Route::get('/rebbotproses', 'RebootController@reboot');

// Route::get('/rebbot', function () {
//     return redirect('/rebbot');
// });