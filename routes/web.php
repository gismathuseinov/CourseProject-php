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
Route::get('/', 'IndexController@main');
Route::get('/index', 'IndexController@index')->name('site.index');
Route::get('/about', 'IndexController@about')->name('about');
Route::get('/contact', 'IndexController@contact')->name('contact');
Route::get('/complaint', 'IndexController@complaint')->name('complaint');
Route::post('/search', 'IndexController@search');
Route::get('/sikayet', 'IndexController@sikeytet');
Route::post('/create_post/{user_id}', 'ComplaintController@create_post');
Route::post('/send', 'ContactController@send');
Route::get('/logout', 'Signout@exit')->name('logout');
Route::get('/post/view/{id}', 'IndexController@post')->name("post.view");

Route::post('/check', 'Check@check')->middleware('auth');
Route::post('/post_comments', 'IndexController@post_comment')->middleware('auth');
//admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/admin/issue', 'AdminController@issue')->name('admin.issue');
    Route::get('/admin/see/{id}', 'AdminController@see')->name('admin.see');
    Route::get('/admin/message', 'AdminController@message')->name('admin.message');
    Route::get('/admin/error', 'AdminController@error');
    Route::get('/admin/start', 'AdminController@start');
    Route::post('/delete', 'Delete@delete');
    Route::post('/edit', 'Edit@edit');
    Route::post('/accept', 'Accept@accept');
});
Auth::routes();


