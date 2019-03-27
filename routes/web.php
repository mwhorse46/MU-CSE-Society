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

//Home Routes
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::POST('/sendmsg','HomeController@insertMessage');

Auth::routes();

//Adimin Home Routes
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/home', 'AdminController@index');
Route::get('/admin/inbox', 'AdminController@inbox')->name('inbox');
Route::get('admin/deleteMessage','AdminController@deleteMsg')->name('deletemsg');

Route::get('/admin/gallery', 'AdminController@gallery')->name('gallery');

//News Routes
Route::get('/admin/news', 'NewsController@index')->name('news');
Route::get('/admin/addNews','NewsController@addForm')->name('addnews');
Route::POST('/admin/insertNews','NewsController@insert')->name('insertnews');
Route::get('admin/editNews','NewsController@editForm')->name('editnews');
Route::POST('/admin/updateNews','NewsController@update')->name('updatenews');
Route::get('admin/deleteNews','NewsController@delete')->name('deletenews');

//Event Routes
Route::get('/admin/events', 'EventController@index')->name('events');
Route::get('/admin/addEvent','EventController@addForm')->name('addevent');
Route::POST('/admin/insertEvent','EventController@insert')->name('insertevent');
Route::get('admin/editEvent','EventController@editForm')->name('editevent');
Route::POST('/admin/updateEvent','EventController@update')->name('updateevent');
Route::get('admin/deleteEvent','EventController@delete')->name('deleteevent');

//Committee Routes
Route::get('/admin/committee', 'MemberController@index')->name('committee');
Route::get('/admin/addMember','MemberController@addForm')->name('addmember');
Route::POST('/admin/insertRole','MemberController@insertRole')->name('insertrole');
Route::POST('admin/updateRole','MemberController@updateRole')->name('updaterole');
Route::get('admin/deleteRole','MemberController@deleteRole')->name('deleterole');