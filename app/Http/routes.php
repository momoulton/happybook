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

Route::post('/books/edit', 'BookController@postEdit');

Route::get('/books/delete/{id}', 'BookController@getDelete');

Route::get('/books/do/delete/{id}', 'BookController@getDoDelete');

// meetings routes

Route::get('/meetings', 'MeetingController@getIndex');

Route::get('/meetings/show/{id}', 'MeetingController@getShow');

Route::get('meetings/create', 'MeetingController@getCreate');

Route::post('meetings/create', 'MeetingController@postCreate');

Route::get('/meetings/edit/{id}', 'MeetingController@getEdit');

Route::post('/meetings/edit', 'MeetingController@postEdit');

Route::get('/meetings/delete/{id}', 'MeetingController@getDelete');

Route::get('/meetings/do/delete/{id}', 'MeetingController@getDoDelete');

// ballots routes

Route::get('/ballots', 'BallotController@getIndex');

Route::get('ballots/create', 'BallotController@getCreate');

Route::post('ballots/create', 'BallotController@postCreate');

Route::get('/ballots/edit/{id}', 'BallotController@getEdit');

Route::post('/ballots/edit', 'BallotController@postEdit');

Route::get('/ballots/delete/{id}', 'BallotController@getDelete');

Route::get('/ballots/do/delete/{id}', 'BallotController@getDoDelete');

Route::get('/ballots/vote/{id}', 'BallotController@getVote');

Route::post('/ballots/vote', 'BallotController@postVote');

Route::get('/ballots/tally/{id}', 'BallotController@getTally');

Route::post('/ballots/tally', 'BallotController@postTally');

// user authentication

# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');

// debug route

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});
