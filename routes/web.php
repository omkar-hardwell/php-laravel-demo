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

/*Route::get('/', function () {
    return view('welcome');
});*/

// Department module routes
Route::get('crud/departments', 'CRUDDemoController@view_departments');
Route::get('crud/add_department', 'CRUDDemoController@add_department');
Route::post('crud/department', 'CRUDDemoController@save_department');
Route::get('crud/edit_department/{department_id}', 'CRUDDemoController@edit_department');
Route::post('crud/update_department/{department_id}', 'CRUDDemoController@update_department');
Route::get('crud/delete_department/{department_id}', 'CRUDDemoController@delete_department');

// Employee module routes
Route::get('crud/employees', 'CRUDDemoController@view_employees');
Route::get('crud/add_employee', 'CRUDDemoController@add_employee');
Route::post('crud/employee', 'CRUDDemoController@save_employee');
Route::get('crud/edit_employee/{employee_id}', 'CRUDDemoController@edit_employee');
Route::post('crud/update_employee/{employee_id}', 'CRUDDemoController@update_employee');
Route::get('crud/delete_employee/{employee_id}', 'CRUDDemoController@delete_employee');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
