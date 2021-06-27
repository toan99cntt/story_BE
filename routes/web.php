<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/clear-cache',function ()
{
	$exitcode=Artisan::call('cache:clear');
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('truyen', 'HomeController@story')->name('story');
Route::get('thong-tin-truyen/{id_story}', 'HomeController@story_detail')->name('story.detail');
Route::post('thong-tin-truyen/{id_story}', 'HomeController@comment')->name('comment');
Route::get('chapter/{id_chap}/{id_story}.php', 'HomeController@chapter')->name('chapter');
Route::get('yeu-thich/{id}', 'HomeController@love')->name('love');
Route::post('tim-kiem', 'HomeController@search')->name('search');
Route::get('truyen-audio', 'HomeController@audio')->name('audio');

Route::post('danh-sach-truyen/{id}', 'HomeController@filter')->name('filter');
Route::get('danh-sach-truyen-the-loai/{id_gen}', 'HomeController@list_story')->name('list.story');

Route::get('admin/login', 'AdminController@admin_login')->name('admin.login');
Route::post('admin/login', 'AdminController@admin_login_post')->name('admin.login.post');


Route::group(['prefix'=>'thong-tin'],function ()
{
	Route::post('dang-ky','LoginController@sign_post')->name('sign_post');
	Route::get('dang-ky','LoginController@sign')->name('sign');

	Route::get('dang-nhap','LoginController@login')->name('login');
	Route::post('dang-nhap','LoginController@login_post')->name('login');
	Route::get('dang-xuat','LoginController@logout')->name('logout');
	Route::get('thong-tin-doc-gia','LoginController@em_profile')->name('em.profile');
	Route::get('sua-thong-tin-doc-gia','LoginController@edit_profile')->name('edit.profile');
	Route::post('sua-thong-tin-doc-gia','LoginController@edit_profile_post')->name('edit.profile.post');
	Route::get('doi-mat-khau','LoginController@edit_pword')->name('edit.password');
	Route::post('doi-mat-khau','LoginController@edit_pword_post')->name('edit.password.post');
	Route::get('list-yeu-thich','LoginController@love_list')->name('love.list');
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function()
{
	Route::get('/','AdminController@index')->name('admin.index');
	Route::get('administrators/create','AdminController@create')->name('admin.create');
	Route::post('administrators/create','AdminController@store')->name('admin.store');
	Route::get('administrators/{id}/edit','AdminController@edit')->name('admin.edit');
	Route::put('administrators/{id}/edit','AdminController@update')->name('admin.update');
	Route::delete('administrators/delete/{id}','AdminController@destroy')->name('admin.destroy');
	Route::resource('audio','AudioController');
	Route::resource('author','AuthorController');
	Route::resource('category','CategoryController');
	Route::resource('chapter','ChapterController');
	Route::resource('comment','CommentController');
	Route::resource('employer','EmployerController');
	Route::resource('genre','GenreController');
	Route::resource('story','StoryController');
	

});
