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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','HomeController@index');

Route::get('/inventorypage','InventorypageController@pages');

Route::get('/inventory/item/create','ItemController@create');

Route::post('/inventory/item','ItemController@store');



Route::resource('inventory','InventoryController');

Route::resource('purchasings','PurchasingsController');

Route::resource('cuttings','CuttingStageController');