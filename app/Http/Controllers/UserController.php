<?php

namespace Blooddivision\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Blooddivision\Http\Requests;
use Blooddivision\Http\Requests\CreateEventRequest;
use Blooddivision\Http\Requests\CreateGameRequest;
use Blooddivision\Http\Controllers\Controller;
use Auth;
use Blooddivision\User;
use Blooddivision\Event;
use Blooddivision\Game;
use Carbon\Carbon;

// brug sluggable i stedet for a lede efter User->name. https://github.com/cviebrock/eloquent-sluggable
// aldrig brug DB klassen. Hvis du gør, kan det med 90% sikkerhed gøres på en nemmere måde.
// brug ->first(); fremfor take(1)->get();
// læs hele dokumentationen igennem for Laravel Relations: https://laravel.com/docs/5.2/eloquent-relationships, evt https://laracasts.com/series/laravel-5-fundamentals/episodes/14
// modeller skal ALTID være kaldt i singular form. Dvs User, Post, Message, ikke Users, Posts, Messages

class UserController extends Controller
{
    /**
    * show the user profile layout
    * @return profile
    */

    public function profile($name){
    	// step 1 => get the specific user
      $auth = auth()->user(); 
    	$user = User::where('name', Auth::user()->name)->orWhere('name', $name)->get(); //- first name og lastname conventeres automatisk til leo-knudsen
    	// step 2 => get the events belongs to the user

       // $events = $user->events; // ==== $user->events()->get();
       $events = Event::with('users')->where('events.user_id', $auth->id)->latest()->take(1);

       $games = Game::latest()->take(1);
        // $events = Event::all()->take(10)->get(); // get  
        
    	// step 3 => get the profile view
    	return view('pages.profile_home', compact('user', 'events'));
        return vide('layouts.profile', compact('user'));
    }

    /**
    * show the profile events
    * @return events
    */

    public function profileEvents($name){
      $auth = auth()->user();
    	// step 1 => get the profile
    	$user = User::where('name', $name)->get();
    	// step 2 => get the events belongs to the user

    	// $events = User::all()->event()->get();

        $events = Event::with('users')->where('events.user_id', $auth->id)->get();

    	// step 4 => load view
    	return view('pages.profile_events', compact('user', 'events'));
    }

    /**
    * show specific event that is pointed to the logged in user
    * @return event
    */

    public function profileEvent($slug){
    	$the_event = Event::where('event_title', $slug)->limit(1)->get();
    }

    /**
    * create event form 
    * @return void
    */

    public function createProfileEvent(){
    	/**
    	* select the authorized user
    	*/
    	$user = User::where('name', Auth::user()->name)->limit(1)->get();

    	/**
    	* select all games
    	*/
    	$games = Game::all();

    	/**
    	* return the view
    	*/
    	return view('pages.create_event', compact('user', 'games'));
    }

    /**
    * store the created event
    * @param Blooddivision\Http\Requests\CreateEventRequest::class
    * @return void
    */

    public function storeEvent(CreateEventRequest $request){
    	/**
    	* step 1 => create the model row
    	*/
    	Event::create([
    		'event_name' => $request->get('event_name'),
            'event_game' => $request->get('event_game'),
            'event_datetime' => $request->get('event_datetime'),
            'event_description' => $request->get('event_desc'),
            'user_id' => auth()->user()->id
    	]);

    	/**
    	* step 2 => redirect the user to the your events route
    	*/
    	return redirect('/profile/{{Auth::user()->name}}/your-events');
    }

    /**
    * thrash the chosen event
    * @param $id = INT
    * @return void
    */
    public function thrashEvent($id){
    	Event::where('id', $id)->delete();
    	return redirect('/profile/{{Auth::user()->name}}/your-events');
    }

    /**
     * get the games of the profile
     * 
     * @return [array] [the users favourite games]
     */
    
    public function profileGames(){

        $auth = auth()->user();
        /**
         * fetch the user
         * @var [array]
         */
        $user = User::where('name', Auth::user()->name)->get();
        // $games = Game::find('id')->with('user')->get();
    
        /**
         * fetch the users added games
         */
    
        $games = Game::with('user')->where('games.user_id', $auth->id)->get();

                 // dd($games);

        return view('pages.profile_games', compact('user', 'games'));
    }

    /**
     * store the users game 
     *
     * @return  object [game object model]
     */
    
    public function storeProfileGame(CreateGameRequest $request){
        Game::create(['game' => $request->get('game_name'), 'user_id' => Auth::user()->id])->save();
    }
}