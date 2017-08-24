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
	Route::resource('/merk', 'Admin\MerkController', ['as'=>'admin']);
	Route::post('/merk/store', ['as'=>'admin.merk.store', 'uses'=>'Admin\MerkController@store']);
	Route::post('/merk/delete', ['as'=>'admin.merk.delete', 'uses'=>'Admin\MerkController@delete']);


	Route::resource('/type', 'Admin\TypeController', ['as'=>'admin']);
	Route::post('/type/store', ['as'=>'admin.type.store', 'uses'=>'Admin\TypeController@store']);
	Route::post('/type/delete', ['as'=>'admin.type.delete', 'uses'=>'Admin\TypeController@delete']);


	Route::resource('/vehiclecollateral', 'Admin\VehicleCollateralController', ['as'=>'admin']);
	Route::post('/vehiclecollateral/delete', [
		'as'=>'admin.vehiclecollateral.delete', 
		'uses'=>'Admin\VehicleCollateralController@delete'
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


	Route::post('customer/delete', ['as'=>'admin.customer.delete','uses'=>'Admin\CustomerController@delete']);
	Route::resource('customer', 'Admin\CustomerController',['as'=>'admin']);
	Route::get('select2-autocomplete', 'Admin\CustomerController@dataAjax', ['as'=>'admin']);
	

	Route::resource('motor', 'Admin\MotorController', ['as' => 'admin']);
	Route::post('/motor/delete', ['as'=>'admin.motor.delete', 'uses'=>'Admin\MotorController@delete']);
	Route::get('/motor/type/{id}', ['as'=>'myForm.type', 'uses'=>'Admin\MotorController@myformAjax']);
	Route::get('/motor/type/edit/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\MotorController@myformEdit']);
	Route::get('motor/downloadExcel/xls', 'Admin\MotorController@downloadExcel');


	Route::post('master/bank/delete', ['as'=>'admin.master.bank.delete','uses'=>'Admin\BankController@delete']);
	Route::resource('master/bank', 'Admin\BankController',['as'=>'admin.master']);


	Route::post('master/branch/delete', ['as'=>'admin.master.branch.delete','uses'=>'Admin\BranchController@delete']);
	Route::resource('master/branch', 'Admin\BranchController',['as'=>'admin.master']);


	Route::post('master/supplier/delete',['as'=>'admin.master.supplier.delete','uses'=>'Admin\SupplierController@delete']);
	Route::resource('master/supplier','Admin\SupplierController',['as'=>'admin.master']);


	Route::post('master/user/delete',['as'=>'admin.master.user.delete','uses'=>'Admin\UserController@delete']);
	Route::resource('master/user','Admin\UserController',['as'=>'admin.master']);


	Route::post('master/role/delete',['as'=>'admin.master.role.delete','uses'=>'Admin\RoleController@delete']);
	Route::resource('master/role','Admin\RoleController',['as'=>'admin.master']);


	Route::post('master/permission/delete',['as'=>'admin.master.permission.delete','uses'=>'Admin\PermissionController@delete']);
	Route::resource('master/permission', 'Admin\PermissionController',['as'=>'admin.master']);







	Route::post('/leasing/delete',['as'=>'admin.leasing.delete','uses'=>'Admin\LeasingController@delete']);
	Route::resource('/leasing', 'Admin\LeasingController',['as'=>'admin']);


	Route::post('custcoll/delete',['as'=>'admin.custcoll.delete','uses'=>'Admin\CustomerCollateralController@delete']);
	Route::resource('custcoll', 'Admin\CustomerCollateralController',['as'=>'admin']);


	Route::post('cash/delete',['as'=>'admin.cash.delete', 'uses'=>'Admin\CashController@delete']);
	Route::resource('cash', 'Admin\CashController',['as'=>'admin']);

	Route::post('/cashfix/delete',['as'=>'admin.cashfix.delete', 'uses'=>'Admin\CashfixController@delete']);
	Route::resource('/cashfix', 'Admin\CashfixController',['as'=>'admin']);


	Route::post('/history/delete', ['as'=>'admin.history.delete', 'uses'=>'Admin\HistoryController@delete']);
	Route::resource('/history', 'Admin\HistoryController', ['as'=>'admin']);


	Route::resource('/customerupload', 'Admin\CustomerUploadController', ['as'=>'admin']);


	Route::get('/upload', ['as' => 'image.create', 'uses' => 'Admin\CustomerUploadController@create']);
	Route::post('/upload', ['as' => 'image.store' , 'uses' => 'Admin\CustomerUploadController@store']);
});
