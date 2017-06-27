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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard-panel', ['as' => 'user.dashboard', 'uses' => 'backend\DashboardController@index']);

Route::get('/user-register', ['as' => 'user.register', 'uses' => 'backend\UserController@create']);
Route::post('/user-save', ['as' => 'user.store', 'uses' => 'backend\UserController@store']);

Route::get('/', ['as' => 'user.login', 'uses' => 'backend\UserController@index']);
Route::post('/admin-panel', ['as' => 'user.check', 'uses' => 'backend\UserController@login']);
Route::get('/logout', ['as' => 'user.logout', 'uses' => 'backend\UserController@logout']);

Route::get('/module-create', ['as' => 'module.create', 'uses' => 'backend\ModuleController@create']);
Route::post('/module-store', ['as' => 'module.store', 'uses' => 'backend\ModuleController@store']);
Route::get('/module-list', ['as' => 'module.list', 'uses' => 'backend\ModuleController@index']);
Route::get('/module-edit/{id}', ['as' => 'module.edit', 'uses' => 'backend\ModuleController@edit']);
Route::post('/module-update/{id}', ['as' => 'module.update', 'uses' => 'backend\ModuleController@update']);

Route::get('/role-create', ['as' => 'role.create', 'uses' => 'backend\RoleController@create']);
Route::post('/role-store', ['as' => 'role.store', 'uses' => 'backend\RoleController@store']);
Route::get('/role-list', ['as' => 'role.list', 'uses' => 'backend\RoleController@index']);

Route::get('/permission-create', ['as' => 'permission.create', 'uses' => 'backend\PermissionController@create']);
Route::post('/permission-store', ['as' => 'permission.store', 'uses' => 'backend\PermissionController@store']);
Route::get('/permission-list', ['as' => 'permission.list', 'uses' => 'backend\PermissionController@index']);
Route::delete('/permission-delete/{id}', ['as' => 'permission.delete', 'uses' => 'backend\PermissionController@destroy']);
Route::get('/permission-edit/{id}', ['as' => 'permission.edit', 'uses' => 'backend\PermissionController@edit']);
Route::post('/permission-update/{id}', ['as' => 'permission.update', 'uses' => 'backend\PermissionController@update']);


Route::get('/permission/asign/{id}', ['as' => 'permission.asign', 'uses' => 'backend\PermissionController@asign']);
Route::post('/permission/permissionasign/{id}', ['as' => 'permission.permissionasign', 'uses' => 'backend\PermissionController@permissionasign']);


Route::get('/productcategory-create',['as'=>'productcategory.create', 'uses'=>'backend\ProductcategoryController@create']);
Route::get('/productcategory-list',['as'=>'productcategory.list', 'uses'=>'backend\ProductcategoryController@index']);
Route::post('/productcategory-save',['as'=>'productcategory.store', 'uses'=>'backend\ProductcategoryController@store']);
Route::delete('/productcategory-delete/{id}', ['as' => 'productcategory.delete', 'uses' => 'backend\ProductcategoryController@destroy']);
Route::get('/productcategory-edit/{id}/edit', ['as' => 'productcategory.edit', 'uses' => 'backend\ProductcategoryController@edit']);
Route::post('/productcategory-update/{id}', ['as' => 'productcategory.update', 'uses' => 'backend\ProductcategoryController@update']);


Route::get('/product-create',['as'=>'product.create', 'uses'=>'backend\ProductController@create']);
Route::get('/product-list',['as'=>'product.list', 'uses'=>'backend\ProductController@index']);
Route::post('/product-save',['as'=>'product.store', 'uses'=>'backend\ProductController@store']);
Route::delete('/product-delete/{id}', ['as' => 'product.delete', 'uses' => 'backend\ProductController@destroy']);
Route::get('/product-edit/{id}/edit', ['as' => 'product.edit', 'uses' => 'backend\ProductController@edit']);
Route::post('/product-update/{id}', ['as' => 'product.update', 'uses' => 'backend\ProductController@update']);

Route::get('/product-sales',['as'=>'sales.create', 'uses'=>'backend\SalesController@create']);
Route::post('/sales-store',['as'=>'sales.store', 'uses'=>'backend\SalesController@store']);
Route::get('/sales-list',['as'=>'sales.list', 'uses'=>'backend\SalesController@index']);
Route::get('/ajaxsales-list',['as'=>'ajaxsales.list', 'uses'=>'backend\SalesController@ajaxlist']);
Route::get('/sales-allpdf',['as'=>'sales.printall', 'uses'=>'backend\SalesController@getallpdf']);

Route::post('/getproduct',['as'=>'sales.getproduct', 'uses'=>'backend\SalesController@getproduct']);
Route::get('/getajaxproduct',['as'=>'sales.getajaxproduct', 'uses'=>'backend\SalesController@getajaxproduct']);
Route::post('/getquantity',['as'=>'sales.getquantity', 'uses'=>'backend\SalesController@getquantity']);
Route::post('/getprice',['as'=>'sales.getprice', 'uses'=>'backend\SalesController@getprice']);
Route::post('/gettotalprice',['as'=>'sales.gettotalprice', 'uses'=>'backend\SalesController@gettotalprice']);
Route::post('/getproductname',['as'=>'sales.getproductname', 'uses'=>'backend\SalesController@getproductname']);

Route::get('/preorder-create',['as'=>'preorder.create', 'uses'=>'backend\PreorderController@create']);
Route::get('/preorder-list',['as'=>'preorder.list', 'uses'=>'backend\PreorderController@index']);
Route::post('/preorder-save',['as'=>'preorder.store', 'uses'=>'backend\PreorderController@store']);
Route::delete('/preorder-delete/{id}', ['as' => 'preorder.delete', 'uses' => 'backend\PreorderController@destroy']);
Route::get('/preorder-edit/{id}/edit', ['as' => 'preorder.edit', 'uses' => 'backend\PreorderController@edit']);
Route::post('/preorder-update/{id}', ['as' => 'preorder.update', 'uses' => 'backend\PreorderController@update']);

Route::get('/staff-create',['as'=>'staff.create', 'uses'=>'backend\StaffController@create']);
Route::get('/staff-list',['as'=>'staff.list', 'uses'=>'backend\StaffController@index']);
Route::post('/staff-save',['as'=>'staff.store', 'uses'=>'backend\StaffController@store']);
Route::delete('/staff-delete/{id}', ['as' => 'staff.delete', 'uses' => 'backend\StaffController@destroy']);
Route::get('/staff-edit/{id}/edit', ['as' => 'staff.edit', 'uses' => 'backend\StaffController@edit']);
Route::post('/staff-update/{id}', ['as' => 'staff.update', 'uses' => 'backend\StaffController@update']);

Route::get('/salary-create',['as'=>'salary.create', 'uses'=>'backend\SalaryController@create']);
Route::get('/salary-list',['as'=>'salary.list', 'uses'=>'backend\SalaryController@index']);
Route::post('/salary-save',['as'=>'salary.store', 'uses'=>'backend\SalaryController@store']);
Route::delete('/salary-delete/{id}', ['as' => 'salary.delete', 'uses' => 'backend\SalaryController@destroy']);
Route::get('/salary-edit/{id}/edit', ['as' => 'salary.edit', 'uses' => 'backend\SalaryController@edit']);
Route::post('/salary-update/{id}', ['as' => 'salary.update', 'uses' => 'backend\SalaryController@update']);

Route::get('/expenses-create',['as'=>'expenses.create', 'uses'=>'backend\ExpensesController@create']);
Route::get('/expenses-list',['as'=>'expenses.list', 'uses'=>'backend\ExpensesController@index']);
Route::post('/expenses-save',['as'=>'expenses.store', 'uses'=>'backend\ExpensesController@store']);
Route::delete('/expenses-delete/{id}', ['as' => 'expenses.delete', 'uses' => 'backend\ExpensesController@destroy']);
Route::get('/expenses-edit/{id}/edit', ['as' => 'expenses.edit', 'uses' => 'backend\ExpensesController@edit']);
Route::post('/expenses-update/{id}', ['as' => 'expenses.update', 'uses' => 'backend\ExpensesController@update']);

