<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Blooddivision\Http\Requests;
use Blooddivision\Http\Requests\CreateEventRequest;
use Blooddivision\Http\Controllers\Controller;
use Blooddivision\Event;
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
    
        $events = DB::table('events')->leftJoin('users', 'users.id', '=', 'events.user_id')->where('users.id', 'events.user_id')->select('*')->get();
        
        // $events = Event::with('users')->where('users.user_id', 'events.user_id')->get();

    	/**
    	* return events view with the all the events
    	*/
    	return view('pages.events')->with('events', $events);
    }

    /**
     * show latest events
     * @return [type] [description]
     */
    public function latest(){

    }

    /**
     * show all completed events
     * @return [type] [description]
     */
    public function completed(){

    }

    /**
    *	store a new event 
    *	@param \Illuminate\Http\Request
    *	@return void
    */

    public function storeEvent(CreateEventRequest $request){
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
    	Event::create([
    		'event_title' 		=> $request->get('event_title'), 
    		'event_game' 		=> $request->get('event_game'), 
    		'event_description' => $request->get('event_desc'),
            'event_datetime'    => $request->get('event_datetime'),
    		'user_id'	 		=> auth()->user()->id
    	])->save();

    	/**
    	*	redirect the user to the events page
    	*	@param $view = /events
    	*/
    	return redirect('/events');
    }
}
