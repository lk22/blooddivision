<?php



/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function(){
    return view('test');
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/members', 'PageController@getMembersPage');

    // home route
    Route::get('/home', 'HomeController@index');
    
    // events route
    Route::get('/events', 'EventController@events');
    
    // event route
    Route::get('/event/{id}', 'EventController@event');
    
    // forum route
    Route::get('/forum', 'ForumController@index');
    
    // profile route
    Route::get('/profile/{name}', 'UserController@profile');
    
});

/**
* events 
*/

    Route::group(['prefix' => '/events', 'middleware' => 'web'], function(){

        // all events
        Route::get('/filter/{all}', 'EventController@allEvents');

    });

/**
* set a route group for the profile navigations
*/

Route::group(['prefix' => '/profile/{name}', 'middleware' => 'web'], function() {

    // the events route
    Route::get('your-events', 'UserController@profileEvents');

    // the event route
    Route::get('/your-events/{slug}', 'UserController@profileEvent');

    // create-event route
    Route::get('/create-event', 'UserController@createProfileEvent');
    Route::post('/create-event', 'UserController@storeEvent');

    // the games route
    Route::get('your-games', 'UserController@profileGames');

    // the stats route
    Route::get('your-stats', 'UserController@profileStats');

    // the about route
    Route::get('about', 'UserController@profileAbout');
});
