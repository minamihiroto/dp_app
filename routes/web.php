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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/post', 'PostsController@index')->name('post')->middleware('auth');
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show','destroy']])->middleware('auth');
Route::resource('comments', 'CommentsController', ['only' => ['store']])->middleware('auth');

Route::get('news','NewsController@index')->name('news');
Route::resource('news', 'NewsController',['only'=>['create','store','show','destroy']]);

Route::get('top','MainController@index')->name('top');
Route::get('instructor','MainController@instructor')->name('instructor');
Route::get('lesson','MainController@lesson')->name('lesson');
Route::get('online','MainController@online')->name('online');
