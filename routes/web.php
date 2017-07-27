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



Route::group([
	'prefix' => 'admin',
	'middleware' => 'auth',
], function(){
	Route::resource('/merk', 'Admin\MerkController');
	Route::post('/merk/store', ['as'=>'admin.merk.store', 'uses'=>'Admin\MerkController@store']);
	Route::post('/merk/delete', ['as'=>'admin.merk.delete', 'uses'=>'Admin\MerkController@delete']);


	Route::resource('/type', 'Admin\TypeController');
	Route::post('/type/store', ['as'=>'admin.type.store', 'uses'=>'Admin\TypeController@store']);
	Route::post('/type/delete', ['as'=>'admin.type.delete', 'uses'=>'Admin\TypeController@delete']);


	Route::resource('/vehiclecollateral', 'Admin\VehicleCollateralController');
	Route::post('/vehiclecollateral/store', [
		'as'=>'admin.vehiclecollateral.store', 
		'uses'=>'Admin\VehicleCollateralController@store'
	]);
	Route::post('/vehiclecollateral/delete', [
		'as'=>'admin.vehiclecollateral.delete', 
		'uses'=>'Admin\VehicleCollateralController@delete'
	]);
	Route::get('/vehiclecollateral/create', [
		'as'=>'admin.vehiclecollateral.create', 
		'uses'=>'Admin\VehicleCollateralController@create'
	]);
	Route::get('/vehiclecollateral/type/{id}', [
		'as'=>'myForm.type', 
		'uses'=>'Admin\VehicleCollateralController@myformAjax'
	]);
	Route::get('/vehiclecollateral/type/edit/{id}', [
		'as'=>'myForm.ajax', 
		'uses'=>'Admin\VehicleCollateralController@myformEdit'
	]);
	Route::get('vehiclecollateral/downloadExcel/xls', 'Admin\VehicleCollateralController@downloadExcel');



	Route::resource('/loan', 'Admin\LoanController');
	Route::post('/loan/store', ['as'=>'admin.loan.store', 'uses'=>'Admin\LoanController@store']);
	Route::post('/loan/delete', ['as'=>'admin.loan.delete', 'uses'=>'Admin\LoanController@delete']);
	Route::get('/loan/create', ['as'=>'myForm', 'uses'=>'Admin\LoanController@create']);
	Route::get('/loan/ajax/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\LoanController@myformAjax']);
	Route::post('/loan/edit/ajax/{id}', ['as' => 'myForm.loan', 'uses' => 'Admin\LoanController@myformEdit']);
	Route::get('/loan/edit/{id}', ['as'=>'admin.loan.edit', 'uses'=>'Admin\LoanController@edit']);
	Route::patch('/loan/{id}', [
		'as' => 'admin.loan.update',
		'uses' => 'Admin\LoanController@update']);
	Route::get('loan/downloadExcel/xls', 'Admin\LoanController@downloadExcel');



	Route::resource('/motor', 'Admin\MotorController');
	Route::post('/motor/store', ['as'=>'admin.motor.store', 'uses'=>'Admin\MotorController@store']);
	Route::post('/motor/delete', ['as'=>'admin.motor.delete', 'uses'=>'Admin\MotorController@delete']);
	Route::get('/motor/create', ['as'=>'admin.motor.create', 'uses' => 'Admin\MotorController@create']);
	Route::get('/motor/edit/{id}', ['as' => 'admin.motor.edit', 'uses' => 'Admin\MotorController@edit']);
	Route::patch('/motor/{id}', ['as' => 'admin.motor.update', 'uses' => 'Admin\MotorController@update']);
	Route::get('/motor/type/{id}', ['as'=>'myForm.type', 'uses'=>'Admin\MotorController@myformAjax']);
	Route::get('/motor/type/edit/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\MotorController@myformEdit']);
	Route::get('motor/downloadExcel/xls', 'Admin\MotorController@downloadExcel');



	Route::resource('/customer', 'Admin\CustomerController');
	Route::post('/customer/store', ['as' => 'admin.customer.store', 'uses' => 'Admin\CustomerController@store']);
	Route::post('/customer/delete', ['as' => 'admin.customer.delete', 'uses' => 'Admin\CustomerController@delete']);
	Route::get('/customer/create', ['as' => 'admin.customer.create', 'uses' => 'Admin\CustomerController@create']);
	Route::get('/customer/edit/{id}', ['as' => 'admin.customer.edit', 'uses' => 'Admin\CustomerController@edit']);
	Route::patch('/customer/{id}', ['as' => 'admin.customer.update', 'uses' => 'Admin\CustomerController@update']);



	Route::resource('/upload', 'UploadController');
	Route::get('/upload/', 'UploadController@index');
	Route::get('/upload/get/{filename}', ['as' => 'getupload', 'uses'=>'UploadController@get']);
	Route::post('/upload/add', ['as'=>'addupload', 'uses' => 'UploadController@add']);
	Route::delete('/upload/{id}', 'UploadController@destroy');

});
