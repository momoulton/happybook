<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@getIndex');

// books routes

Route::get('/books', 'BookController@getIndex');

Route::get('/books/show/{id}', 'BookController@getShow');

Route::get('books/create', 'BookController@getCreate');

Route::post('books/create', 'BookController@postCreate');

Route::get('/books/edit/{id}', 'BookController@getEdit');

Route::post('/books/edit/{id}', 'BookController@postEdit');

Route::post('/books/delete/{id}', 'BookController@postDelete');

// meetings routes

Route::get('/meetings', 'MeetingController@getIndex');

Route::get('/meetings/show/{date}', 'MeetingController@getShow');

Route::get('meetings/create', 'MeetingController@getCreate');

Route::post('meetings/create', 'MeetingController@postCreate');

Route::get('/meetings/edit/{date}', 'MeetingController@getEdit');

Route::post('/meetings/edit/{date}', 'MeetingController@postEdit');

Route::post('/meetings/delete/{date}', 'MeetingController@postDelete');

// ballots routes

Route::get('/ballots', 'BallotController@getIndex');

Route::get('/ballots/show/{id}', 'BallotController@getShow');

Route::get('ballots/create', 'BallotController@getCreate');

Route::post('ballots/create', 'BallotController@postCreate');

Route::get('/ballots/edit/{id}', 'BallotController@getEdit');

Route::post('/ballots/edit/{id}', 'BallotController@postEdit');

Route::post('/ballots/delete/{id}', 'BallotController@postDelete');

Route::get('/ballots/vote/{id}', 'BallotController@getVote');

Route::post('/ballots/vote/{id}', 'BallotController@postVote');

Route::get('/ballots/tally/{id}', 'BallotController@getTally');
