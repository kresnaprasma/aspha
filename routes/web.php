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


	Route::get('loan/create', ['as'=>'admin.loan.create','uses'=>'Admin\LoanController@create']);
/*	Route::resource('/loan', 'Admin\LoanController', ['as'=>'admin']);
	Route::post('/loan/delete', ['as'=>'admin.loan.delete', 'uses'=>'Admin\LoanController@delete']);	
	Route::get('/loan/ajax/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\LoanController@myformAjax']);
	Route::get('/loan/edit/ajax/{id}', ['as' => 'myForm.loan', 'uses' => 'Admin\LoanController@myformEdit']);
	Route::get('loan/downloadExcel/xls', 'Admin\LoanController@downloadExcel');*/



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


	Route::post('customer/delete', ['as'=>'admin.customer.delete','uses'=>'Admin\CustomerController@delete']);
	Route::resource('customer', 'Admin\CustomerController',['as'=>'admin']);


	Route::post('master/user/delete',['as'=>'admin.master.user.delete','uses'=>'Admin\UserController@delete']);
	Route::resource('master/user','Admin\UserController',['as'=>'admin.master']);


	Route::post('master/role/delete',['as'=>'admin.master.role.delete','uses'=>'Admin\RoleController@delete']);
	Route::resource('master/role','Admin\RoleController',['as'=>'admin.master']);


	Route::post('master/permission/delete',['as'=>'admin.master.permission.delete','uses'=>'Admin\PermissionController@delete']);
	Route::resource('master/permission', 'Admin\PermissionController',['as'=>'admin.master']);


	Route::post('loan/leasing/delete',['as'=>'admin.loan.leasing.delete','uses'=>'Admin\LeasingController@delete']);
	Route::resource('loan/leasing', 'Admin\LeasingController',['as'=>'admin.loan']);


	Route::post('loan/custcoll/delete',['as'=>'admin.loan.custcoll.delete','uses'=>'Admin\CustomerCollateralController@delete']);
	Route::resource('loan/custcoll', 'Admin\CustomerCollateralController',['as'=>'admin.loan']);


	Route::post('loan/cash/delete',['as'=>'admin.loan.cash.delete', 'uses'=>'Admin\CashController@delete']);
	Route::resource('loan/cash', 'Admin\CashController',['as'=>'admin.loan']);


	Route::resource('/loan/customerupload', 'Admin\CustomerUploadController', ['as'=>'admin.loan']);

/*	Route::resource('/upload', 'UploadController');
	Route::get('/upload/', 'UploadController@index');
	Route::get('/upload/get/{filename}', ['as' => 'getupload', 'uses'=>'UploadController@get']);
	Route::post('/upload/add', ['as'=>'addupload', 'uses' => 'UploadController@add']);
	Route::delete('/upload/{id}', 'UploadController@destroy');*/

});
