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


Route::resource('inventory','InventoryController');

Route::resource('purchasings','PurchasingsController');

Route::resource('cuttings','CuttingStageController');

Route::post('cuttings/{id}','CuttingStageController@update_status');

Route::get('/ovens','OvenStageController@index');

Route::get('/ovens/get_ref','OvenStageController@precreate');

Route::post('/ovens/get_ref','OvenStageController@create');

// Route::get('/ovens/create','OvenStageController@create');

Route::post('/ovens/create','OvenStageController@store');
