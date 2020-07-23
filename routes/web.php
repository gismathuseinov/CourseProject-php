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
Route::get('/index', 'IndexController@index');
Route::get('/about', 'IndexController@about');
Route::get('/contact', 'IndexController@contact');
Route::get('/sikayetler', 'IndexController@sikayet');
Route::post('/search', 'IndexController@search');
Route::get('/sikayet', 'IndexController@sikeytet');
Route::post('/sikayetyaz', 'ComplaintController@write');
Route::post('/send', 'ContactController@send');
Route::get('/logout', 'Signout@exit');
Route::get('/post/view/{id}', 'IndexController@post')->name("post.view");

Route::post('/check', 'Check@check')->middleware('auth');
Route::post('/post_comments', 'IndexController@post_comment')->middleware('auth');
//admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', 'AdminController@admin');
    Route::get('/admintable', 'AdminController@admintable');
    Route::get('/adminsee/{id}', 'AdminController@adminsee');
    Route::get('/adminmessage', 'AdminController@adminmessage');
    Route::get('/adminerror', 'AdminController@adminerror');
    Route::get('/adminstart', 'AdminController@adminstart');
    Route::post('/delete', 'Delete@delete');
    Route::post('/edit', 'Edit@edit');
    Route::post('/accept', 'Accept@accept');
});
Auth::routes();


