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

Route::get('encrypt', 'HashController@url')->name('url');
Route::get('/{hash}/{encrypt}/textplain/{textPlain}','HashController@hash')->name('hashpage');
Route::get('/comment/create', 'CommentController@create')->name('comment.create');
Route::get('/comment/edit/{id}', 'CommentController@edit')->name('comment.edit');
Route::put('/comment/update/{id}', 'CommentController@update')->name('comment.update');
Route::get('/comment/store', 'CommentController@store')->name('comment.store');
Route::delete('/comment/destroy/{id}', 'CommentController@destroy')->name('comment.destroy');

Route::get('/home', 'HomeController@index')->name('home');
