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
	return View::make('hello');
});

Route::get('/songs/search', 'SongController@search');

Route::get('/songs', 'SongController@listSongs');



Route::get('/dvds/search', 'DvdController@search');

Route::get('/dvds', 'DvdController@listDvds');

Route::get('/dvds/create', 'DvdController@create');

Route::post('/dvds', 'DvdController@insert');




Route::get('/facebook/search', 'FacebookController@search');

Route::get('/facebook', 'FacebookController@results');

Route::get('/facebook/login', function() {
	return View::make('facebook/login');
});



Route::get('/movies/search', 'MovieController@search');

Route::get('/movies/box-office', 'MovieController@boxOffice');

Route::get('/movies/in-theaters', 'MovieController@inTheaters');



Route::get('/quickflix', 'MovieController@home');

Route::get('/quickflix/theaters', 'MovieController@inTheaters');

Route::get('/quickflix/soon', 'MovieController@comingSoon');

Route::get('/quickflix/bucket', 'MovieController@favorites');

Route::get('/quickflix/search', 'MovieController@search');

Route::get('/quickflix/login', 'MovieController@login');

Route::post('/quickflix/login-process', 'MovieController@loginProcess');

Route::get('/quickflix/register', 'MovieController@register');

Route::get('/quickflix/logout', 'MovieController@logout');












