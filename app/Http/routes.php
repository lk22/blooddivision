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
use Blooddivision\User;
use Blooddivision\Game;
use Blooddivision\Event;
use Blooddivision\Rank;

Route::get('/search', function(){
    return view('search');
});

Route::get('/angular', function(){
    return view('angular');
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

    Route::get('/test', function () {
        // $events = Event::with('user')->latest()->take(5)->get();
        // 
        // $tests = Rank::with('user')->get();
        // foreach ($tests as $test) {
        //     echo $test->id . ': ' .$test->rank .  ' belongs to ' . $test->user->name ."<br><br>";
        // }
        
        dd(bcrypt('23'));
    });

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/members', 'PageController@getMembersPage');
    

    // home route
    Route::get('/home', 'HomeController@index');

    // route group for events
    Route::group(['prefix' => '/events'], function(){
        // all events
        Route::get('/', 'EventController@events');

        // latest events
        Route::get('/latest', 'EventController@latest');

        // completed events
        Route::get('/completed', 'EventController@completed');

        // event route
        Route::get('/event/{id}', 'EventController@event');

    });

    Route::get('about', function(){
    	return view('pages.about');
    });

    Route::get('contact-us', 'ContactController@index');
    Route::post('contact-us', 'ContactController@create');

    
    // forum route
    Route::get('/forum', 'ForumController@index');
    
    // profile route
    Route::get('/profile/{slug}', 'UserController@profile');
    
    Route::get('/profile/{slug}/settings/general', 'UserSettingsController@index');
});

/**
* set a route group for the profile navigations
*/

Route::group(['prefix' => '/profile/{slug}', 'middleware' => 'web'], function() {
    Route::post('/', 'UserController@editDescription');
    // the events route
    Route::get('your-events', 'UserController@profileEvents');

    // the event route
    Route::get('/your-events/{name}', 'UserController@profileEvent');

    // create-event route
    Route::get('/create-event', 'UserController@createProfileEvent');
    Route::post('/create-event', 'UserController@storeEvent');

    // the games route
    Route::get('/your-games', 'UserController@profileGames');
    Route::post('/your-games', 'UserController@storeProfileGame');

    // the stats route
    // Route::get('your-stats', 'UserController@profileStats');

    // the about route
    Route::get('biography', 'UserController@profileAbout');
});

Route::group(['prefix' => '/profile/{slug}/settings', 'middleware' => 'web'], function(){

    Route::get('/general', 'UserSettingsController@index');
    Route::post('/general', 'UserSettingsController@updateUser');

    Route::get('/games', 'UserSettingsController@gamesSettings');

    Route::get('/events', 'UserSettingsController@eventsSettings');
    Route::get('/events/create-event', 'UserSettingsController@createEventView');
    Route::post('/events/create-event', 'UserSettingsController@storeEvent');

});
