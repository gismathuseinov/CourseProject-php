<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('','IndexController@index')->name('site.index');
Route::get('/index','IndexController@index')->name('site.index');
Route::get('/complaints','ComplaintController@index')->name('site.complaints');
Route::get('/contact', 'ContactController@index')->name('site.contact');
Route::get('/about', 'IndexController@about')->name('site.about');
//Route::get('/how-it-works', 'ContactController@howItWork')->name('site.how.work');
Route::get('/write/complaint', 'IndexController@write')->name('write.complaint')->middleware('auth');


Route::get('/post/view/{id}', 'ComplaintController@post')->name("post.view");
Route::post('/send', 'ContactController@send')->name('send');

Route::get('/post/{post_id}/comments', 'IndexController@get_post_comments')->name('post.get.comments');
Route::post('/search', 'SearchController@search')->name('search');


Route::middleware(['auth'])->group(function () {
    Route::post('/create_post', 'ComplaintController@create_post')->name('write.post');
    Route::post('/post/{post_id}/comment/create', 'CommentController@comment_create')->name('post.create.comment');
    Route::post('/check', 'CheckController@check');
    Route::get('/user/dashboard', 'GetUserPost@index')->name('user.dashboard');
    Route::get('/user/complaints', 'GetUserPost@complaints')->name('user.complaints');
    Route::get('/logout', 'Signout@exit')->name('logout');
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
    Route::post('/post/active', 'ActiveDeactiveController@active_deactive')->name('post.active');
});
Auth::routes();

Route::prefix('new')->group(function (){

});
