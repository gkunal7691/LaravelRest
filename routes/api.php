<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('employees', 'EmployeeController@index');
Route::get('company/{id}', 'CompanyController@show');
Route::get('user/{id}', 'UserController@index');
Route::get('employee/{id}', 'EmployeeController@show');
Route::post('user', 'UserController@create');
Route::post('empCabs', 'EmployeeController@manyCreate');
Route::get('empCabs/{id}', 'CabsController@show');
Route::post('customers', 'CustomersController@create');
Route::post('company', 'CompanyController@create');
Route::put('company/{id}', 'CompanyController@update');
Route::put('user/update', 'UserController@update');
Route::delete('user/delete', 'UserController@destroy');
Route::post('employee/create', 'EmployeeController@create');
