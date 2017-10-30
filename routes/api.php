<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
	'prefix' => 'v1'/*
	'middleware' => 'auth',*/
], function(){ 

	Route::get('customer/no', 'Api\CustomerController@getCustomerNo', ['as'=>'api']);
	Route::resource('customer', 'Api\CustomerController', ['as'=>'api']);

	Route::resource('merk', 'Api\MerkController', ['as'=>'api']);
	Route::resource('vehiclecollateral', 'Api\VehicleCollateralController', ['as' => 'api']);

	Route::get('uploaddanatunai/get', 'Api\ImageController@get', ['as'=>'api.uploaddanatunai.get']);
	Route::get('uploaddanatunai/getTmp', 'Api\ImageController@getFileTmp', ['as'=>'api.uploaddanatunai.getTmp']);
	Route::resource('uploaddanatunai', 'Api\ImageController', ['as'=>'api']);

	Route::get('cash/no', 'Api\CashController@getNo', ['as'=>'api']);
	Route::resource('cash', 'Api\CashController', ['as'=>'api']);

	Route::get('customercollateral/no', 'Api\CustomerCollateralController@getCollateralNo', ['as'=>'api']);
	Route::resource('customercollateral', 'Api\CustomerCollateralController', ['as'=>'api']);

	Route::resource('mokas', 'Api\MokasController', ['as'=>'api']);
	Route::resource('uploadmokas', 'Api\ImageMokasController', ['as'=>'api']);
	Route::resource('uploadsales', 'Api\ImageSalesController', ['as'=>'api']);
});