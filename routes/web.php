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



Route::get('/balok','BalokController@index');

Route::get('/balok/create','BalokController@create');

Route::post('/balok/items','BalokController@store');

Route::get('/','DashboardController@index');

Route::get('/inventorypage','InventorypageController@pages');

Route::get('/inventory/item/create','ItemController@createe');

Route::post('/inventory/item','ItemController@store');

Route::get('/inventory/{id}','ItemController@itemShow');

Route::get('/datatracking','CodeController@index');

Route::get('/inventori/create','InventorypageController@create');

Route::get('/datatracking/item', [
    'uses' => 'CodeController@dataShow',
   'as' => 'datatracking.show'
    
 ]);

Route::get('/assembly','AssemblyController@index');

Route::get('/assembly/create','AssemblyController@create');

Route::resource('inventory','InventoryController');

Route::resource('purchasings','PurchasingsController');

Route::resource('cuttings','CuttingStageController');

Route::post('cuttings/{id}','CuttingStageController@update_status');

// oven

// Route::resource('/ovens','OvenStageController');

Route::get('/ovens','OvenStageController@index');

Route::get('/ovens/get_ref','OvenStageController@precreate');

Route::post('/ovens/get_ref','OvenStageController@create');

// Route::get('/ovens/create','OvenStageController@create');

Route::post('/ovens/create','OvenStageController@store');

Route::get('/ovens/{id}','OvenStageController@show');

Route::post('/ovens/{id}/destroy','OvenStageController@destroy');

Route::post('/ovens/{id}/update_status','OvenStageController@update_status');

// final



Route::get('/finals','FinalStageController@index');

Route::get('/finals/get_ref','FinalStageController@precreate');

Route::post('/finals/get_ref','FinalStageController@create');

// Route::get('/finals/create','finalStageController@create');

Route::post('/finals/create','FinalStageController@store');

Route::get('/finals/{id}','FinalStageController@show');

Route::post('/finals/{id}/destroy','FinalStageController@destroy');

Route::post('/finals/{id}/update_status','FinalStageController@update_status');


Route::post('/assembly/as','AssemblyController@storee');

Route::get('/assembly/{assemblies}','AssemblyController@show');

Route::get('/inventory/destroy/', 'InventoryController@destroy');

Route::post('/delete','InventoryController@delete');

Route::post('/item/update/{id}', [
    'uses' => 'ItemController@update',
   'as' => 'items.coba'
 ]);

Route::get('/adjustment','AdjustmentinvController@index');

Route::get('/adjustment/create','AdjustmentinvController@create');


 //Manufacturing Report 

 Route::get('/report','ManufacturingReportController@index');

 //Route::get('/report/create','ManufacturingReportController@create');

Route::post('/report','ManufacturingReportController@create');

 Route::post('/report','ManufacturingReportController@getContent');



 
