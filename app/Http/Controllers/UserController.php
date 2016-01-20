<?php

namespace Blooddivision\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Blooddivision\Http\Requests;
use Blooddivision\Http\Requests\CreateEventRequest;
use Blooddivision\Http\Controllers\Controller;
use Auth;
use Blooddivision\User;
use Blooddivision\Events;
use Blooddivision\Games;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
    * show the user profile layout
    * @return profile
    */

    public function profile($name){
    	// step 1 => get the specific user
    	$profile = User::where('name', $name)->limit(1)->get();

    	// step 2 => get the events belongs to the user

    	$events = DB::table('events')
    			  ->join('users', 'users.id', '=', 'events.user_id')
    			  ->select('*')
    			  ->get();

    	// step 3 => get the profile view
    	return view('pages.profile_home', compact('profile', 'events'));
    }

    /**
    * show the profile events
    * @return events
    */

    public function profileEvents($name){
    	// step 1 => get the profile
    	$profile = User::where('name', $name)->limit(1)->get();
    	// step 2 => get the events belongs to the user

    	$events = DB::table('events')
    			  ->join('users', 'users.id', '=', 'events.user_id')
    			  ->select('*')
    			  ->get();

    	// step 3 get the count of the events from the events table
    	$counts = DB::table('events')->count();

    	// step 4 => load view
    	return view('pages.profile_events', compact('profile', 'events', 'counts'));
    }

    /**
    * show specific event that is pointed to the logged in user
    * @return event
    */

    public function profileEvent($slug){
    	$the_event = Events::where('event_title', $slug)->limit(1)->get();
    }

    /**
    * create event form 
    * @return void
    */

    public function createProfileEvent(){
    	/**
    	* select the authorized user
    	*/
    	$profile = User::where('name', Auth::user()->name)->limit(1)->get();

    	/**
    	* select all games
    	*/
    	$games = Games::all();

    	/**
    	* return the view
    	*/
    	return view('pages.create_event', compact('profile', 'games'));
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
    	Events::create([
    		'event_name' 		=> $request->get('event_name'),
    		'event_game' 		=> $request->get('event_game'),
    		'event_date' 		=> Carbon::parse($request->get('event_date')),
    		'event_start_time'  => Carbon::parse($request->get('event_start_time')),
    		'event_end_time'	=> Carbon::parse($request->get('event_end_time')),	
    		'event_desc' 		=> $request->get('event_desc'),
    		'user_id'	 		=> Auth::user()->id
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
    	Events::where('id', $id)->delete();
    	return redirect('/profile/{{Auth::user()->name}}/your-events');
    }
}