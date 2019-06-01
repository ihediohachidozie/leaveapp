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

Route::resource('departments', 'DepartmentController');
Route::resource('category', 'CategoryController');
Route::resource('employees', 'EmployeeController');
Route::resource('leaves', 'LeaveController');
Route::resource('users', 'UserController');

Route::get('leave/history', 'LeaveController@allhistory')->name('leaves.allhistory');
Route::get('leave/emphistory/{id}', 'LeaveController@emphistory')->name('leaves.emphistory');
Route::get('leave/leavesummary/{id}', 'LeaveController@leavesummary')->name('leaves.leavesummary');
//Route::get('leave/editleave/{id}/{staffid}/{dutyRe}', 'LeaveController@editleave')->name('leaves.editleave');
//Route::post('leave/filter', 'LeaveController@filter')->name('leaves.filter');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
