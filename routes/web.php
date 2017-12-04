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
	/*'middleware' => 'auth',*/
], function(){
	//Master Module

	//Master Merk
	Route::resource('master/merk', 'Admin\MerkController', ['as'=>'master']);
	Route::post('master/merk/store', ['as'=>'master.merk.store', 'uses'=>'Admin\MerkController@store']);
	Route::post('master/merk/delete', ['as'=>'master.merk.delete', 'uses'=>'Admin\MerkController@delete']);
	//Master Type
	Route::resource('master/type', 'Admin\TypeController', ['as'=>'master']);
	Route::post('/type/store', ['as'=>'master.type.store', 'uses'=>'Admin\TypeController@store']);
	Route::post('master/type/delete', ['as'=>'master.type.delete', 'uses'=>'Admin\TypeController@delete']);
	//Master Vehicle Collateral
	Route::resource('master/vehiclecollateral', 'Admin\VehicleCollateralController', ['as'=>'master']);
	Route::post('master/vehiclecollateral/delete', ['as'=>'master.vehiclecollateral.delete', 'uses'=>'Admin\VehicleCollateralController@delete']);
	Route::get('master/vehiclecollateral/type/{id}', ['as'=>'myForm.type', 'uses'=>'Admin\VehicleCollateralController@myformAjax']);
	Route::get('master/vehiclecollateral/type/edit/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\VehicleCollateralController@myformEdit']);
	Route::get('master/vehiclecollateral/downloadExcel/xls', 'Admin\VehicleCollateralController@downloadExcel');
	//Master Bank
	Route::post('master/bank/delete', ['as'=>'master.bank.delete','uses'=>'Admin\BankController@delete']);
	Route::resource('master/bank', 'Admin\BankController',['as'=>'master']);
	//Master Branch
	Route::post('master/branch/delete', ['as'=>'master.branch.delete','uses'=>'Admin\BranchController@delete']);
	Route::resource('master/branch', 'Admin\BranchController',['as'=>'master']);
	//Master Supplier
	Route::post('master/supplier/delete',['as'=>'master.supplier.delete','uses'=>'Admin\SupplierController@delete']);
	Route::resource('master/supplier','Admin\SupplierController',['as'=>'master']);
	//Master Checklist
	Route::resource('master/checklist', 'Admin\ChecklistController', ['as'=>'master']);
	Route::post('master/checklist/delete', ['as'=>'master.checklist.delete', 'uses'=>'Admin\ChecklistController@delete']);
	//Master Credittype
	Route::post('master/credittype/delete', ['as'=>'master.credittype.delete', 'uses'=>'Admin\CreditTypeController@delete']);
	Route::resource('master/credittype', 'Admin\CreditTypeController', ['as'=>'master']);
	//Master Leasing
	Route::post('/master/leasing/delete',['as'=>'master.leasing.delete','uses'=>'Admin\LeasingController@delete']);
	Route::resource('/master/leasing', 'Admin\LeasingController',['as'=>'master']);

	//Master User
	Route::post('master/user/delete',['as'=>'master.user.delete','uses'=>'Admin\UserController@delete']);
	Route::resource('master/user','Admin\UserController',['as'=>'master']);
	//Master Role
	Route::post('master/role/delete',['as'=>'master.role.delete','uses'=>'Admin\RoleController@delete']);
	Route::resource('master/role','Admin\RoleController',['as'=>'master']);
	//Master Permission
	Route::post('master/permission/delete',['as'=>'master.permission.delete','uses'=>'Admin\PermissionController@delete']);
	Route::resource('master/permission', 'Admin\PermissionController',['as'=>'master']);


// CASH MODULE //
	//Cash Route
	Route::post('cash/delete',['as'=>'cash.delete', 'uses'=>'Admin\CashController@delete']);
	Route::resource('cash', 'Admin\CashController');
	//Customer Collateral
	Route::post('custcoll/delete',['as'=>'custcoll.delete','uses'=>'Admin\CustomerCollateralController@delete']);
	Route::resource('custcoll', 'Admin\CustomerCollateralController');
	//Approvement 
	Route::post('approve/delete', ['as'=>'approve.delete', 'uses'=>'Admin\CashfixController@delete']);
	Route::resource('approve', 'Admin\CashfixController');
	//History
	Route::post('/history/delete', ['as'=>'history.delete', 'uses'=>'Admin\HistoryController@delete']);
	Route::resource('/history', 'Admin\HistoryController');

	// Route::resource('/customerupload', 'Admin\CustomerUploadController');

//CUSTOMER MODULE
	Route::post('customer/delete', ['as'=>'customer.delete','uses'=>'Admin\CustomerController@delete']);
	Route::resource('customer', 'Admin\CustomerController');
	Route::get('select2-autocomplete', 'Admin\CustomerController@dataAjax');
	
//MOKAS MODULE
	//Mokas
	Route::resource('mokas', 'Admin\MokasController');
	Route::post('/mokas/delete', ['as'=>'mokas.delete', 'uses'=>'Admin\MokasController@delete']);
	Route::get('/mokas/type/{id}', ['as'=>'myForm.type', 'uses'=>'Admin\MokasController@myformAjax']);
	Route::get('/mokas/type/edit/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\MokasController@myformEdit']);
	Route::get('mokas/downloadExcel/xls', 'Admin\MokasController@downloadExcel');
	//Mokas Checklist
	Route::resource('/mokaschecklist', 'Admin\MokasChecklistController');
	Route::post('/mokaschecklist/delete', ['as'=>'mokaschecklist.delete', 'uses'=>'Admin\MokasChecklistController@delete']);
	//Sales
	Route::resource('sales', 'Admin\SalesController');
	Route::post('/sales/delete', ['as'=>'sales.delete', 'uses'=>'Admin\SalesController@delete']);
	Route::get('/sales/type/{id}', ['as'=>'myForm.type', 'uses'=>'Admin\SalesController@myformAjax']);
	Route::get('/sales/type/edit/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\SalesController@myformEdit']);
	Route::get('/sales/downloadExcel/xls', 'Admin\SalesController@downloadExcel');
	//Price Sales History
	Route::resource('/pricesaleshistory', 'Admin\PriceSalesHistoryController');
	Route::post('/pricesaleshistory/delete', ['as'=>'pricesaleshistory.delete', 'uses'=>'Admin\PriceSalesHistoryController@delete']);
	Route::get('/pricesaleshistory/type/{id}', ['as'=>'myForm.type', 'uses'=>'Admin\PriceSalesHistoryController@myformAjax']);
	Route::get('/pricesaleshistory/type/edit/{id}', ['as'=>'myForm.ajax', 'uses'=>'Admin\PriceSalesHistoryController@myformEdit']);
	Route::get('/pricesaleshistory/downloadExcel/xls', 'Admin\PriceSalesHistoryController@downloadExcel');
	//Price History
	Route::resource('/pricehistory', 'Admin\PriceHistoryController');
	Route::post('/pricehistory/delete', ['as'=>'pricehistory.delete', 'uses'=>'Admin\PriceHistoryController@delete']);

//EMPLOYEE MODULE
	// delete Employee
	Route::post('/human-resource/employee/delete',['as'=>'human-resource.employee.delete','uses'=>'EmployeeController@delete']);
	// delete Department
	Route::post('/human-resource/department/delete',['as'=>'human-resource.department.delete','uses'=>'EmployeeDepartmentController@delete']);
	// delete Position
	Route::post('/human-resource/position/delete',['as'=>'human-resource.position.delete','uses'=>'EmployeePositionController@delete']);

	Route::resource('/human-resource/employee', 'EmployeeController',['as'=>'human-resource']);
	Route::resource('/human-resource/department', 'EmployeeDepartmentController',['as'=>'human-resource']);
	Route::resource('/human-resource/position', 'EmployeePositionController',['as'=>'human-resource']);
});
