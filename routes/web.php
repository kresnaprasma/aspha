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

/*	Route::resource('admin/merk', 'Admin\MerkController');
	Route::post('admin/merk/store', ['as'=>'admin.merk.store', 'uses'=>'Admin\MerkController@store']);
	Route::post('admin/merk/delete', ['as'=>'admin.merk.delete', 'uses'=>'Admin\MerkController@delete']);


	Route::resource('admin/type', 'Admin\TypeController');
	Route::post('admin/type/store', ['as'=>'admin.type.store', 'uses'=>'Admin\TypeController@store']);	
	Route::post('admin/type/delete', ['as'=>'admin.type.delete', 'uses'=>'Admin\TypeController@delete']);


	Route::resource('/vehiclecollateral', 'Admin\VehicleCollateralController');
	Route::post('/vehiclecollateral/delete', ['as'=>'admin.vehiclecollateral.delete', 'uses'=>'Admin\VehicleCollateralController@delete']);
	Route::get('/vehiclecollateral/create', ['as'=>'admin.vehiclecollateral.create', 'uses'=>'Admin\VehicleCollateralController@create']);
	Route::get('/vehiclecollateral/type/{id}', ['as'=>'myForm.type', 'uses'=>'Admin\VehicleCollateralController@myformAjax']);
	Route::get('/vehiclecollateral/type/edit/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\VehicleCollateralController@myformEdit']);


	Route::resource('/motor', 'Admin\MotorController');
	Route::post('/motor/delete', ['as'=>'admin.motor.delete', 'uses'=>'Admin\MotorController@delete']);
	Route::get('/motor/create', ['as'=>'admin.motor.create', 'uses' => 'Admin\MotorController@create']);
	Route::get('/motor/type/{id}', ['as'=>'myForm.type', 'uses'=>'Admin\MotorController@myformAjax']);
	Route::get('/motor/type/edit/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\MotorController@myformEdit']);


	Route::resource('/loan', 'Admin\LoanController');
	Route::post('/loan/delete', ['as'=>'admin.loan.delete', 'uses'=>'Admin\LoanController@delete']);
	Route::get('/loan/create', ['as'=>'myForm', 'uses'=>'Admin\LoanController@create']);
	Route::get('/loan/ajax/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\LoanController@myformAjax']);
	Route::post('/admin/create', 'Admin\LoanController@formValidationLoan');*/

Route::group([
	'prefix' => 'admin',
	/*'middleware' => 'auth',*/
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


	Route::resource('/motor', 'Admin\MotorController');
	Route::post('/motor/store', ['as'=>'admin.motor.store', 'uses'=>'Admin\MotorController@store']);
	Route::post('/motor/delete', ['as'=>'admin.motor.delete', 'uses'=>'Admin\MotorController@delete']);
	Route::get('/motor/create', ['as'=>'admin.motor.create', 'uses' => 'Admin\MotorController@create']);
	Route::get('/motor/type/{id}', ['as'=>'myForm.type', 'uses'=>'Admin\MotorController@myformAjax']);
	Route::get('/motor/type/edit/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\MotorController@myformEdit']);


	Route::resource('/loan', 'Admin\LoanController');
	Route::post('/loan/store', ['as'=>'admin.loan.store', 'uses'=>'Admin\LoanController@store']);
	Route::post('/loan/delete', ['as'=>'admin.loan.delete', 'uses'=>'Admin\LoanController@delete']);
	Route::get('/loan/create', ['as'=>'myForm', 'uses'=>'Admin\LoanController@create']);
	Route::get('/loan/ajax/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\LoanController@myformAjax']);
	Route::post('/loan/import', 'Admin\LoanController@import');

	Route::resource('/client', 'Admin\ClientController');
	Route::post('/client/delete', ['as'=>'admin.client.delete', 'uses'=>'Admin\ClientController@delete']);


	Route::resource('/fileentry', 'HomeController');
	Route::get('/fileentry/', 'HomeController@index');
	Route::get('/fileentry/get/{ filename }', ['as' => 'getentry', 'uses' => 'HomeController@get']);
	Route::post('/fileentry/add', ['as' => 'addentry', 'uses' => 'FileEntryController@add']);
	Route::post('/fileentry/addmultiple', ['as' => 'multiple_upload', 'uses' => 'FileEntryController@multiple_upload']);
	Route::delete('/fileentry/{id}', 'FileEntryController@destroy');

});
