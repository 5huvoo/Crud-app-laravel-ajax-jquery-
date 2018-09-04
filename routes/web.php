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

Route::get('/', 'UsersController@index');
Route::post('insertdata','UsersController@insertdata');
Route::post('updatedata','UsersController@updatedata');
Route::post('deletedata','UsersController@deletedata');
Route::post('check', 'UserController@check'); // not working
Route::post('checkemail', 'UserController@checkemail')->middleware('ajax'); // not working
