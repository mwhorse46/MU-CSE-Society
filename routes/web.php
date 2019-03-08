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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::POST('/sendmsg','HomeController@insertMessage');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/home', 'AdminController@index');
Route::get('/admin/news', 'AdminController@news')->name('news');
Route::get('/admin/inbox', 'AdminController@inbox')->name('inbox');
Route::get('/admin/events', 'AdminController@events')->name('events');
Route::get('/admin/gallery', 'AdminController@gallery')->name('gallery');
Route::get('/admin/committee', 'AdminController@committee')->name('committee');

Route::get('/admin/addnews','AdminController@addNews')->name('addnews');
