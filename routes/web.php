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
Route::post('/save-vendor','VendorsController@addvendor');
Route::post('/save-vendor-family','VendorsController@addvendorfamily');
Route::post('/save-vendor-helper','VendorsController@addvendor');
Route::post('/add-child-birthday','VendorsController@addchild');

Route::post('/add-vendor-helper','VendorsController@addhelper');




Route::post('/login/submit','HomeController@authenticate');
Route::get('/logout','HomeController@logout');



/*AJAX*/
Route::get('index', function(){ return view('index'); });
Route::post('/postajax','AjaxController@post');