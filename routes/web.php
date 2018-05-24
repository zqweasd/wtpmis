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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/','HomeController@index');

Route::get('/admin/view-users','UserController@index');
Route::post('/inactive-user','UserController@inactive');
Route::post('/save-user','UserController@save');

Route::get('/vendors','VendorsController@view');


Route::post('/login/submit','HomeController@authenticate');
Route::get('/logout','HomeController@logout');
