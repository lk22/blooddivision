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

use Blooddivision\Helpers\Helper;


class EventController extends Controller
{

    /**
    *	tell the controller wich middleware to use
    *
    *	@return void
    */
    public function __construct(Event $event, User $user){
    	$this->middleware('auth');

        $this->event = $event;
        $this->user = $user;
    }

    /**
    *	get the events view
    *	@return void
    */
    public function events(){
    
    
        $events = $this->user->belongsToEvents;

        dd($events);
        
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

        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

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
    	$this->event->create([
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

    public function participate(){
        
    }

}