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

	Route::resource('customer', 'Api\CustomerController', ['as'=>'api']);

	Route::resource('merk', 'Api\MerkController', ['as'=>'api']);

	Route::resource('upload', 'Api\ImageController', ['as'=>'api']);

	Route::post('upload/post', 'Api\ImageController@postupload');

	Route::get('example-2', ['as' => 'upload-2', 'uses' => 'Api\ImageController@getServerImagesPage']);
	
	Route::get('server-images', ['as' => 'server-images', 'uses' => 'Api\ImageController@getServerImages']);

	// Route::get('files', 'ImageController@getUploadForm');
	// Route::post('/files/image','ImageController@postUpload');
});