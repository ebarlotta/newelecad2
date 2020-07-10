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

/*
Route::get('/home', 'PrincipalController@index')->name('principal');
Route::get('/home/{id?}', 'PrincipalController@index')->name('otra');

route::get('clients/show_all',  'ClientController@show_all')->name('clients.show_all');
//route::get('clients/index', 'ClientController@index')->name('clients.show_all');
route::get('clients/create', 'ClientController@create')->name('clients.create');
route::get('clients/create/{id}', 'ClientController@create')->name('clients.createHeredado');
route::post('clients/store', 'ClientController@store')->name('clients.store');
route::get('clients/{id}/edit',  'ClientController@edit')->name('clients.edit');
route::get('clients/{id}/destroy', 'ClientController@destroy')->name('clients.destroy');
route::post('clients/update/{id}',  'ClientController@update')->name('clients.update');
*/

// PRODUCTOS

//route::get('products/show',  'ProductsController@show')->name('products.show');
route::get('products',  'ProductsController@show')->name('products.show');
/*route::get('products/{id}/edit',  'ProductsController@edit')->name('products.edit');
route::get('products/{id}/destroy', 'ProductsController@destroy')->name('products.destroy');
route::get('products/create', 'ProductsController@create')->name('products.create');
route::post('products/store', 'ProductsController@store')->name('products.store');
route::post('products/update/{id}',  'ProductsController@update')->name('products.update');
*/

// FORMAS DE PAGO
//route::get('formas', 'FormsController@addFormas')->name('formas');
/*route::get('forms/show',  'FormsController@show_all')->name('forms.show_all');
route::get('forms/{id}/edit',  'FormsController@edit')->name('forms.edit');
route::get('forms/{id}/destroy', 'FormsController@destroy')->name('forms.destroy');
route::get('forms/create', 'FormsController@create')->name('forms.create');
route::post('forms/store', 'FormsController@store')->name('forms.store');
route::post('forms/update/{id}',  'FormsController@update')->name('forms.update');
*/

// LISTAS DE PRECIO
route::post('store',   'ListController@store')->name('lists.store');
route::post('update/{id}',  'ListController@update')->name('lists.update');

route::get('lists/show',  'ListController@show_all')->name('show');
route::get('lists/show',  'ListController@show_all')->name('lists.show');

route::get('lists/{id}/destroy', 'ListController@destroy')->name('lists.destroy');
//route::get('lists/{id}/destroy', 'ListController@delete')->name('destroy');

route::get('lists/create',  'ListController@create')->name('lists.create');
route::get('lists/{id}/edit',  'ListController@edit')->name('lists.edit');

// ORDENES DE TRABAJO
//route::get('OT',  'OtController@index')->name('OT.index');
route::get('OT',    'OtController@show')->name('OT.index');
route::get('OT/{id?}',    'OtController@index')->name('OT.modificar');
//route::post('OT/{ot_id}',  'OtController@show')->name('OT.show');
route::post('OT',  'OtController@index')->name('OT.store');
route::post('OT_Add/{ot_id?}', 'OtController@OT_Add')->name('OT_Add');
route::get('OT_change_state/{id_ots}', 'OtController@OT_change_state')->name('OT_change_state');
route::get('OT_change_details/{ot_id}/{details?}', 'OtController@OT_change_details')->name('OT_change_details');
route::get('OT_remove_item/{id_item}', 'OtController@OT_remove_item')->name('OT_remove_item');

route::get('ot_edit_detail/{id_ot?}', 'OtController@ot_edit_detail')->name('ot_edit_detail');
route::post('ot_update_detail1/{id_ot?}', 'OtController@ot_update_detail1')->name('ot_update_detail1');
//Route::view('/OT/OT_index_file', 'ot_index_file');

route::get('OT_add_file/{id_ot}', 'OtController@OT_add_file')->name('OT_add_file');

//route::post('OT/{id}',  'OtController@getPrice')->name('getPrice');


//route::get('OT/OT_Add/{OT_date?}/{OT_client?}/{OT_detail?}',  'OTController@OT_Add')->name('OT_Add');

