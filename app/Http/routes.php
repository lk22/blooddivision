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

    Route::group(['middleware' => 'web'], function () {

        /**
         * Auth 
         */

            Route::auth();

        /**
         * testing route
         */

            Route::get('/test', function () {
                // $events = Event::with('user')->latest()->take(5)->get();
                // 
                // $tests = Rank::with('user')->get();
                // foreach ($tests as $test) {
                //     echo $test->id . ': ' .$test->rank .  ' belongs to ' . $test->user->name ."<br><br>";
                // }
                
                // dd(bcrypt('23'));
            });

        /**
         * welcome page
         */

            Route::get('/', function () {
                return view('welcome');
            });

        /**
         * members route
         */

            Route::get('/members', 'PageController@getMembersPage');
            
        /**
         * home route for authorized user
         */

            // home route
            Route::get('/home', 'HomeController@index');

        /**
         * events
         */

            // // route group for events
            // Route::group(['prefix' => 'events'], function(){

            //     /**
            //      * all events
            //      */
            //         Route::get('/', 'EventController@events');
            //         Route::get('/all', 'EventController@events');

            //     /**
            //      * latest events
            //      */
            //         Route::get('/latest', 'EventController@latest');

            //     /**
            //      * completed events
            //      */
            //         Route::get('/completed', 'EventController@completed');

            //     /**
            //      * single event
            //      */
            //         Route::get('/event/{slug}', 'EventController@event');

            // });

            Route::get('about', function(){
            	return view('pages.about');
            });
            
        /**
         * contact page
         */

            Route::get('contact-us', 'ContactController@index');
            Route::post('contact-us', 'ContactController@create');

            // forum route
            Route::group(['prefix' => 'forum', 'middleware' => 'web'], function () {

                /**
                 * show all threads in general
                 */
                
                    Route::get('/', 'ForumController@index');

                /**
                 * filtered threads from thread categories
                 */
                
                    Route::post('/filter/{category}', 'ForumController@filter');


                /**
                 * show posts from particullar thread
                 */
                
                    Route::get('/forum/{thread}/', 'ForumController@posts');

                /**
                 * show single post
                 */

                    Route::get('/forum/{thread}/{post}', 'ForumController@post');

            });
        
            
        });

    /**
    * set a route group for the profile navigations
    */

        Route::group(['prefix' => '/profile/{slug}', 'middleware' => 'web'], function() {

            /**
             * profile page
             */
            
                Route::get('/', 'UserController@profile');

            /**
             * change user description
             */

                Route::post('/', 'UserController@editDescription');

            /**
             * users events
             */
        
                Route::get('your-events', 'UserController@profileEvents');

            /**
             * users single event
             */
            
                Route::get('/your-events/{name}', 'UserController@profileEvent');

            /**
             * users games route
             */


                Route::get('/your-games', 'UserController@profileGames');

            // /**
            //  * biography
            //  */

            //     Route::get('biography', 'UserController@profileAbout');
        });

    /**
     * users manage backend 
     */

        Route::group(['prefix' => '/profile/{slug}/manage', 'middleware' => 'web'], function(){

            /**
             * settings for profile page
             */

                Route::get('/general', 'ManageController@index');
                Route::post('/general', 'ManageController@updateUser');

            /**
             * games main view
             */

                Route::get('/games', 'ManageController@gamesSettings');

            /**
             * manage user events
             */
            
                /**
                 * users events
                 */

                    Route::get('/events', 'ManageController@eventsSettings');

                /**
                 * create the event
                 */
                
                    Route::get('/events/create', 'ManageController@createEventView');
                    Route::post('/events/create', 'ManageController@storeEvent');

                /**
                 * edit the event
                 */
                
                    Route::get('/events/edit/{name}', 'ManageController@editEventView');
                    Route::post('/events/edit/{name}', 'ManageController@updateEvent');

        // 'ManageController@manageGamesView'
        
        /**
         * manage users games 
         */
    
            Route::get('/games', function() {
                $game = new Game;

                $games = $game->whereUserIsAuthorized()->get();

                dd($games);
            });
            Route::get('/games/create', 'ManageController@createGame');
            Route::post('/games/create', 'ManageController@storeGame');
            Route::get('/games/{game}/edit', 'ManageController@editGameView');
            Route::post('/games/{game}/edit', 'ManageController@editGame');

        });
