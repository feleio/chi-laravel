<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('/artworks');
});

Route::get('/chichi', function()
{
	return Redirect::to('/auth/login');
});

Route::get('/aboutme', function()
{
	return View::make('aboutme');
});

Route::controller('auth','AuthController');

Route::controller('images', 'ImageController');

Route::resource('posts', 'PostController', 
	array('except' => array('destroy')));

Route::post('posts/{id}/like',array('uses'=>'PostController@like'));

Route::resource('artworks', 'ArtworkController',
	array('except' => 
		array('create', 'store', 'show', 'edit', 'update', 'destory')));

Route::resource('users', 'UserController');

Route::controller('messages', 'MessageController');
