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
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::get('/complaint', 'ComplaintController@complaint')->name('complaint');
Route::post('/search', 'SearchController@search')->name('search');
Route::get('/sikayet', 'IndexController@sikeytet')->name('write.complaint');
Route::get('/logout', 'Signout@exit')->name('logout');
Route::get('/post/view/{id}', 'ComplaintController@post')->name("post.view");
Route::post('/send', 'ContactController@send');

Route::get('/post/{post_id}/comments', 'IndexController@get_post_comments')->name('post.get.comments');

Route::middleware(['auth'])->group(function () {
    Route::post('/create_post', 'ComplaintController@create_post');
    Route::post('/post/{post_id}/comment/create', 'CommentController@comment_create')->name('post.create.comment');
    Route::post('/check', 'CheckController@check');
});
//admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/admin/issue', 'AdminController@issue')->name('admin.issue');
    Route::get('/admin/message', 'AdminController@message')->name('admin.message');
    Route::post('/see', 'AdminController@see');
    Route::post('/delete', 'DeleteController@delete');
    Route::post('/edit', 'EditController@edit');
    Route::post('/accept', 'AcceptController@accept');
});
Auth::routes();


