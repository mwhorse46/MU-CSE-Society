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

Route::get('/cse-society', function () {
    return view('welcome');
});

Route::POST('/sendmsg','MessageController@insert');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');

Route::get('/admin/inbox', 'HomeController@inbox')->name('inbox');
