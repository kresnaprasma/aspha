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
	/*'middleware' => 'auth',*/
], function(){
	Route::resource('master/merk', 'Admin\MerkController', ['as'=>'admin.master']);
	Route::post('master/merk/store', ['as'=>'admin.master.merk.store', 'uses'=>'Admin\MerkController@store']);
	Route::post('master/merk/delete', ['as'=>'admin.master.merk.delete', 'uses'=>'Admin\MerkController@delete']);


	Route::resource('master/type', 'Admin\TypeController', ['as'=>'admin.master']);
	Route::post('/type/store', ['as'=>'admin.master.type.store', 'uses'=>'Admin\TypeController@store']);
	Route::post('master/type/delete', ['as'=>'admin.master.type.delete', 'uses'=>'Admin\TypeController@delete']);


	Route::resource('master/vehiclecollateral', 'Admin\VehicleCollateralController', ['as'=>'admin.master']);
	Route::post('master/vehiclecollateral/delete', [
		'as'=>'admin.master.vehiclecollateral.delete', 
		'uses'=>'Admin\VehicleCollateralController@delete'
	]);
	Route::get('master/vehiclecollateral/type/{id}', [
		'as'=>'myForm.type', 
		'uses'=>'Admin\VehicleCollateralController@myformAjax'
	]);
	Route::get('master/vehiclecollateral/type/edit/{id}', [
		'as'=>'myForm.ajax', 
		'uses'=>'Admin\VehicleCollateralController@myformEdit'
	]);
	Route::get('master/vehiclecollateral/downloadExcel/xls', 'Admin\VehicleCollateralController@downloadExcel');


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

	Route::post('master/credittype/delete', ['as'=>'admin.master.credittype.delete', 'uses'=>'Admin\CreditTypeController@delete']);
	Route::resource('master/credittype', 'Admin\CreditTypeController', ['as'=>'admin.master']);


	Route::post('cash/delete',['as'=>'admin.cash.delete', 'uses'=>'Admin\CashController@delete']);
	Route::resource('cash', 'Admin\CashController',['as'=>'admin']);


	Route::post('approve/delete', ['as'=>'admin.cashfix.delete', 'uses'=>'Admin\CashfixController@delete']);
	Route::resource('approve', 'Admin\CashfixController', ['as'=>'admin']);/*
	Route::get('approve/fix', ['as'=>'admin.approve.fix', 'uses'=>'Admin\CashfixController@cashapp']);*//*
	Route::get('approve/fix/{id}', ['as'=>'admin.approve.show', 'uses'=>'Admin\CashfixController@show']);*/


	Route::post('/loan/leasing/delete',['as'=>'admin.loan.leasing.delete','uses'=>'Admin\LeasingController@delete']);
	Route::resource('/loan/leasing', 'Admin\LeasingController',['as'=>'admin.loan']);


	Route::post('custcoll/delete',['as'=>'admin.custcoll.delete','uses'=>'Admin\CustomerCollateralController@delete']);
	Route::resource('custcoll', 'Admin\CustomerCollateralController',['as'=>'admin']);


	/*Route::post('/cashfix/delete',['as'=>'admin.cashfix.delete', 'uses'=>'Admin\CashfixController@delete']);*/
	/*Route::resource('/cashfix', 'Admin\CashfixController',['as'=>'admin']);*/


	Route::post('/history/delete', ['as'=>'admin.history.delete', 'uses'=>'Admin\HistoryController@delete']);
	Route::resource('/history', 'Admin\HistoryController', ['as'=>'admin']);


	Route::resource('/customerupload', 'Admin\CustomerUploadController', ['as'=>'admin']);


	Route::get('cash/upload', ['as' => 'admin.loan.customerupload.create', 'uses' => 'Admin\CustomerUploadController@create']);
	Route::post('cash/upload', ['as' => 'admin.loan.customerupload.store' , 'uses' => 'Admin\CustomerUploadController@store']);


	Route::post('customer/delete', ['as'=>'admin.customer.delete','uses'=>'Admin\CustomerController@delete']);
	Route::resource('customer', 'Admin\CustomerController',['as'=>'admin']);
	Route::get('select2-autocomplete', 'Admin\CustomerController@dataAjax', ['as'=>'admin']);
	

	Route::resource('motor', 'Admin\MotorController', ['as' => 'admin']);
	Route::post('/motor/delete', ['as'=>'admin.motor.delete', 'uses'=>'Admin\MotorController@delete']);
	Route::get('/motor/type/{id}', ['as'=>'myForm.type', 'uses'=>'Admin\MotorController@myformAjax']);
	Route::get('/motor/type/edit/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\MotorController@myformEdit']);
	Route::get('motor/downloadExcel/xls', 'Admin\MotorController@downloadExcel');
});
