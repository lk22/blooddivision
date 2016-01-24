<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Blooddivision\Http\Requests;
use Blooddivision\Http\Controllers\Controller;
use Blooddivision\Events;
use Blooddivision\User;
use Auth;
use DB;

class EventController extends Controller
{
    /**
    *	tell the controller wich middleware to use
    *
    *	@return void
    */

    public function __construct(){
    	$this->middleware('auth');
    }

    /**
    *	get the events view
    *	@return void
    */

    public function events(){
    	/**
    	* get all the scheduled events from all the users
        * @return \Illuminate\Database\QueryBuilder::class
    	*/
    	$users_events = DB::table('events')
                  ->join('users', 'users.id', '=', 'events.user_id')
                  ->select('*')
                  ->get();

    	/**
    	* return events view with the all the events
    	*/
    	return view('pages.events')->with('users_events', $users_events);
    }

    /**
    *	store a new event 
    *	@param \Illuminate\Http\Request
    *	@return void
    */

    public function storeEvent(Request $request){
    	/**
    	*	create the new event
    	*	@param event_title 			=> $request->get('event_title'), 
    	*	@param event_game  			=> $request->get('event_game'),
    	*	@param event_description	=> $request('event_description'),
    	*	@param event_date			=> Carbon\Carbon::now()
    	*	@param event_time 			=> Carbon::time()
    	*	@param user_id				=> Auth::user->id
    	*	@return model
    	*/
    	Events::create([
    		'event_title' 		=> $request->get('event_title'), 
    		'event_game' 		=> $request->get('event_game'), 
    		'event_description' => $request('event_description'),
    		'event_date' 		=> Carbon::now(),
    		'event_time' 		=> Carbon::time(),
    		'user_id'	 		=> Auth::user()->id
    	]);

    	/**
    	*	redirect the user to the events page
    	*	@param $view = /events
    	*/
    	return redirect('/events');
    }
}
