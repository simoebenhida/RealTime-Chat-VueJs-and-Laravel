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

Route::get('/chat/{id}', [
	'uses' => 'UserController@chat',
	'as' => 'chat'
	]);

Auth::routes();
Route::get('/',[
	'uses' => 'UserController@getUser'
	]);
Route::post('/add_message',[
	'uses' => 'UserController@add',
	'as' => 'add_chat'
	]);

// Route::get('/home', 'HomeController@index')->name('home');
