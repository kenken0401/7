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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/del/{id}','HomeController@delete')->name('del');

Route::get('/home', 'HomeController@postIndex')->name('posts.index');

Route::get('/signup', 'SignUpController@showList')->name('signup');

Route::post('insert', 'SignUpController@create');

Route::get('/detail/{id}','DetailController@showDetail')->name('detail');

Route::get('/edit/{id}','EditController@showEdit')->name('edit');

Route::patch('/update/{id}','EditController@update')->name('update');
