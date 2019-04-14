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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/home/ShowAlbum', 'HomeController@goToAlbum')->name('home.showalbum');
Route::POST('/sendmsg','HomeController@insertMessage');

Auth::routes();

//Adimin Home Routes
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/home', 'AdminController@index');
Route::get('/admin/gallery/ShowAlbum', 'AdminController@goToAlbum')->name('showalbum');
Route::get('/admin/inbox', 'AdminController@inbox')->name('inbox');
Route::get('/admin/deleteMessage','AdminController@deleteMsg')->name('deletemsg');

//News Routes
Route::get('/admin/news', 'NewsController@index')->name('news');
Route::get('/admin/addNews','NewsController@addForm')->name('addnews');
Route::POST('/admin/insertNews','NewsController@insert')->name('insertnews');
Route::get('/admin/editNews','NewsController@editForm')->name('editnews');
Route::POST('/admin/updateNews','NewsController@update')->name('updatenews');
Route::get('/admin/deleteNews','NewsController@delete')->name('deletenews');

//Event Routes
Route::get('/admin/events', 'EventController@index')->name('events');
Route::get('/admin/addEvent','EventController@addForm')->name('addevent');
Route::POST('/admin/insertEvent','EventController@insert')->name('insertevent');
Route::get('/admin/editEvent','EventController@editForm')->name('editevent');
Route::POST('/admin/updateEvent','EventController@update')->name('updateevent');
Route::get('/admin/deleteEvent','EventController@delete')->name('deleteevent');

//Committee Routes
Route::get('/admin/committee', 'MemberController@index')->name('committee');
Route::get('/admin/addMember','MemberController@addForm')->name('addmember');
Route::POST('/admin/insertMember','MemberController@insertMember')->name('insertmember');
Route::get('/admin/editMember','MemberController@editForm')->name('editmember');
Route::POST('/admin/updateMember','MemberController@updateMember')->name('updatemember');
Route::get('/admin/deleteMember','MemberController@deleteMember')->name('deletemember');
Route::POST('/admin/insertRole','MemberController@insertRole')->name('insertrole');
Route::POST('/admin/updateRole','MemberController@updateRole')->name('updaterole');
Route::get('/admin/deleteRole','MemberController@deleteRole')->name('deleterole');

//Gallery Routes
Route::get('/admin/gallery', 'GalleryController@index')->name('gallery');
Route::get('/admin/gallery/album', 'GalleryController@goToAlbum')->name('album');
Route::POST('/admin/gallery/insertPhoto','GalleryController@insertPhoto')->name('insertphoto');
Route::POST('/admin/gallery/updatePhoto','GalleryController@updatePhoto')->name('updatephoto');
Route::get('/admin/gallery/deletePhoto','GalleryController@deletePhoto')->name('deletephoto');
Route::POST('/admin/insertAlbum','GalleryController@insertAlbum')->name('insertalbum');
Route::POST('/admin/updateAlbum','GalleryController@updateAlbum')->name('updatealbum');
Route::get('/admin/deleteAlbum','GalleryController@deleteAlbum')->name('deletealbum');